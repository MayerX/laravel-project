<?php

namespace App\Http\Controllers;

use App\Models\MembersBlob;
use Illuminate\Http\Request;

class RehabController extends Controller
{

    private $movementTepes = ['Bobath握手', '伸肘压手', '肩关节水平外展', '肘关节屈曲触头', '患手摸肩', '曲压旋前旋后',
        '屈肘压腕训练', '对指训练', '抓握圆柱', '抓球', '半蹲训练', '上台阶训练', '伸髋伸膝', '双腿交替负重', '坐站训练'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @param $patientId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Request $request, $patientId)
    {
        // select * from members_blob mb where mb.userId = '1316486645';
        if ($request['startTime'] != null && $request['endTime'] != null) {
            $startTime = $request['startTime'];
            $endTime = $request['endTime'];

            if (strtotime($startTime) > strtotime($endTime)) {
                $temp = $startTime;
                $startTime = $endTime;
                $endTime = $temp;
            }

            $blobs = MembersBlob::query()
                ->where('userId', $patientId)
                ->whereBetween('time', [$startTime, $endTime])
                ->paginate(5);
        }
        elseif ($request->has('sort')) {
            $sort = $request['sort'];

            if ($sort == 'asc') {
                $blobs = MembersBlob::query()
                    ->where('userId', $patientId)
                    ->orderBy('MovementType', 'asc')
                    ->paginate(5);
                session()->flash('sort', 'desc');
            }
            else {
                $blobs = MembersBlob::query()
                    ->where('userId', $patientId)
                    ->orderBy('MovementType', 'desc')
                    ->paginate(5);
                session()->flash('sort', 'asc');
            }
        }
        else {
            $blobs = MembersBlob::query()
                ->where('userId', $patientId)
                ->orderBy('time', 'desc')
                ->paginate(5);
        }

        $types = $this->movementTepes;

        return view('resources.rehab.index', compact('blobs', 'types'));
    }

    /**
     * @param $patientId
     * @param $time
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($patientId, $time)
    {
        $res = MembersBlob::query()
            ->where('userId', $patientId)
            ->where('time', $time)
            ->delete();

        if ($res == 1) {
            $data = [
                'status' => '200',
                'msg' => 'success',
                'code' => $res,
            ];
        }
        else {
            $data = [
                'status' => '400',
                'msg' => 'error',
                'code' => $res,
            ];
        }

        return response()->json($data);
    }

    /**
     * @param $patientId
     * @param $time
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function show_get($patientId, $time)
    {
        $detail = MembersBlob::query()
            ->where('userId', $patientId)
            ->where('time', $time)
            ->first();

        $type = $detail['MovementType'];
        $score = $detail['score'];
        $typeDetail = $this->movementTepes[$type];

        if ($type == 2){
            $typeName = ['手套-手腕上移数据', '手套-手腕下移数据', '手套-无名指数据', '手套-中指数据', '手套-食指数据', '手套-拇指数据'];
        }
        else{
            $typeName = ['前臂模块-X轴数据', '前臂模块-Y轴数据', '前臂模块-Z轴数据', '后臂模块-X轴数据', '后臂模块-Y轴数据', '后臂模块-Z轴数据'];
        }

        return view('resources.rehab.show', compact('typeName', 'patientId', 'time', 'typeDetail', 'score'));
    }

    /**
     * @param $patientId
     * @param $time
     * @return \Illuminate\Http\JsonResponse
     */
    public function show_post($patientId, $time)
    {
        //　数据库数据 detail
        $detail = MembersBlob::query()
            ->where('userId', $patientId)
            ->where('time', $time)
            ->first();

        // 动作类型 moveType
        $moveType = $detail['MovementType'];

        // 文件 file
        $file = $detail['file'];
        $file = str_replace(' ', '+', $file);
        $file = base64_decode($file, true);

        // 文件分类总数 fileCSum
        $fileCSum = 6;

        // 文件长度 length
        $length = strlen($file);

        // 文件类型 fileType
        // 抽样速率 samplingRate
        // 每类总数 fileCNum
        if ($moveType < 6 || $moveType > 9) {
            $fileType = 1;
            $samplingRate = 12;
            $fileCNum = $length / 16;
        }
        else {
            $fileType = 2;
            $samplingRate = 10;
            $fileCNum = $length / 8;
        }

        // 最终展示数据 data
        $data = $this->blobToArray($file, $fileCSum, $fileCNum, $fileType);

        for ($index = 0; $index < $fileCSum; $index += 1) {
            $dataC = $data[$index];
            unset($dataC[$fileCNum - 1]);
            $dataC = $this->filter($dataC);

            for ($item = 1; $item < $fileCNum; $item += 1) {
                $jsonArr[$item - 1] = array(round($item / $samplingRate, 2), $dataC[$item - 1]);
            }

            $jsonData[] = $jsonArr;
        }

        return response()->json(['status' => 200, 'data' => $jsonData]);
    }

    /**
     * 对文件信息进行base64解码
     *
     * @param $x
     * @return array
     */
    private function base64Decode($x)
    {
        $Len = strlen($x);   // 字符串长度

        $Groups = $Len / 4;

        $base64Table = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";   // base64表


        if (substr($x, -2, 2) == "==") {
            $p = 2;
            $x = substr_replace($x, 'AA', -2, 2);  // ==号替换成00
        }
        elseif (substr($x, -1, 1) == "=") {
            $p = 1;
            $x = substr_replace($x, 'A', -1, 1);  // =号替换成0
        }
        else {
            $p = 0;
        }

        $y = array();    // 输入字符串
        for ($i = 0; $i < $Groups; $i++) {
            $temp = substr($x, $i * 4, 4);   // 循环取出四个字节
            for ($j = 0; $j < 4; $j++) {
                $y[$i][$j] = (int)strpos($base64Table, $temp[$j]);
            }
        }

        $z = array();    // 解码字符串
        for ($i = 0; $i < $Groups; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $z[$i][$j] = (int)0;
            }
        }

        for ($i = 0; $i < $Groups; $i++) {
            $z[$i][0] = ($y[$i][0] << 2) % 256;
            $z[$i][0] = $z[$i][0] | $y[$i][1] >> 4;

            $z[$i][1] = ($y[$i][1] << 4) % 256;
            $z[$i][1] = $z[$i][1] | $y[$i][2] >> 2;

            $z[$i][2] = ($y[$i][2] << 6) % 256;
            $z[$i][2] = $z[$i][2] | $y[$i][3];
        }

        $X = array();
        for ($i = 0; $i < $Groups; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $X[$i * 3 + $j] = $z[$i][$j];
            }
        }

        if ($p == 1) {
            array_splice($X, -1, 1);
        }
        elseif ($p == 2) {
            array_splice($X, -2, 2);
        }

        return $X;
    }

    /**
     * 将一个字节字符串(每个字节使用HEX)转换为一个浮点数数组
     *
     * @param $rawData
     * @param $allCol
     * @param $allRow
     * @param $fileType
     * @return mixed
     */
    private function blobToArray($rawData, $allCol, $allRow, $fileType)
    {
        if ($fileType == 1) {
            for ($i = 0; $i < $allRow; $i++) { // go through all rows in the orginal BIN file
                $temp = substr($rawData, $i * 16, 16);

                // $temp = array_slice($rawData, $i*16, 16);

                for ($j = 0; $j < 3; $j++) { // get X, Y, Z
                    $data[$j][$i] = $this->processCSVData($temp, $j * 2 + 1); //模块1
                    $data[$j + 3][$i] = $this->processCSVData($temp, $j * 2 + 9); //模块2
                }
            }
        }
        else {
            for ($i = 0; $i < $allRow; $i++) {
                $temp = substr($rawData, $i * 8, 8);
                for ($j = 1; $j < 7; $j++) {
                    $t = ord(substr($temp, $j, 1));
                    $data[$j - 1][$i] = $t;
                }
            }
        }

        return $data;
    }

    /**
     * @param $value
     * @param $p
     * @return float|int
     */
    private function processCSVData($value, $p)
    {
        $h = ord(substr($value, $p, 1));
        $l = ord(substr($value, $p + 1, 1));

        if ($h > 127) { // 负数， 2's
            return ($h * 256 + $l - 65536) * 3.9 / 1000;
        }
        else {
            return ($h * 256 + $l) * 3.9 / 1000;
        }
    }

    /**
     * 滤波函数，对一列数据进行三点五次滤波
     *
     * @param $data1
     * @return mixed
     */
    private function filter($data1)
    {
        $width = 80;
        //平滑处理
        $lth1 = count($data1) - 1;//取得一列数据长度
        for ($i = 0; $i < 5; $i++) {//五次三点均值滤波
            for ($k = 1; $k < $lth1; $k++) {
                $data1[$k] = round(($data1[$k] + $data1[$k + 1] + $data1[$k - 1]) / 3, 4);
            }
        }
        return $data1;
    }
}
