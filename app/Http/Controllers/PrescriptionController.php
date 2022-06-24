<?php

namespace App\Http\Controllers;

use App\Models\MembersComment;
use App\View\Components\select;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PrescriptionController extends Controller
{

    private $actions = ['上肢 -> bobath握手', '上肢 -> 伸肘压手', '上肢 -> 肩关节水平外展', '上肢 -> 肘关节屈曲触头',
        '上肢 -> 患手摸肩', '上肢 -> 屈曲旋前旋后', '手部-> 屈肘压腕训练', '手部-> 对指训练', '手部-> 抓握训练',
        '手部 -> 抓球运动', '下肢 -> 半蹲训练', '下肢 -> 上台阶训练', '下肢 -> 伸髋伸膝', '下肢 -> 双腿交替负重',
        '下肢 -> 坐站训练'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create_get()
    {
//        $actions = ['上肢 -> bobath握手', '上肢 -> 伸肘压手', '上肢 -> 肩关节水平外展', '上肢 -> 肘关节屈曲触头',
//            '上肢 -> 患手摸肩', '上肢 -> 屈曲旋前旋后', '手部-> 屈肘压腕训练', '手部-> 对指训练', '手部-> 抓握训练',
//            '手部 -> 抓球运动', '下肢 -> 半蹲训练', '下肢 -> 上台阶训练', '下肢 -> 伸髋伸膝', '下肢 -> 双腿交替负重',
//            '下肢 -> 坐站训练'];

        $actions = $this->actions;

        return view('resources.doctor.prescription.create', compact('actions'));
    }

    public function create_post(Request $request)
    {
        $actions = $this->actions;
        $selected = null;

        for ($index = 0; $index < count($actions); $index += 1) {
            if ($request->has('value_' . $index)) {
                $selected[] = ($index + 1) . '.' . $actions[$index] . ':每天' . $request->get('day_' . $index) . '次,每次' . $request->get('group_' . $index) . '次,每组10遍';
            }
        }

        $prescription = new MembersComment;
        $prescription->userId = session()->get('patient_id');
        $prescription->memberId = session()->get('patient_id');
        $prescription->doctorId = auth()->user()['userId'];
        $prescription->comment = implode('</br>', $selected);
        $prescription->time = date('Y-m-d H:i:s');
        $prescription->save();


        return Redirect::to('doctor/prescription/'.session()->get('patient_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $patient_id
     * @param $time
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $patient_id, $time)
    {
        MembersComment::query()
            ->where('userId', $patient_id)
            ->where('time', $time)
            ->delete();

        return response()->json(['status' => '200', 'msg' => '成功删除']);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $patientId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request, $patientId)
    {
        if ($request['startTime'] != null && $request['endTime'] != null) {
            $startTime = $request['startTime'];
            $endTime = $request['endTime'];

            $prescriptions = DB::table('members_comments as mc')
                ->join('personal_details as pd', 'mc.userId', 'pd.userId')
                ->select('mc.*', 'pd.name')
                ->where('mc.userId', $patientId)
                ->whereBetween('mc.time', [$startTime, $endTime])
                ->orderBy('mc.time', 'desc')
                ->paginate(5);

            return view('resources.doctor.prescription.show', compact('prescriptions', 'startTime', 'endTime'));
        }
        else {
            $prescriptions = DB::table('members_comments as mc')
                ->join('personal_details as pd', 'mc.userId', 'pd.userId')
                ->select('mc.*', 'pd.name')
                ->where('mc.userId', $patientId)
                ->orderBy('mc.time', 'desc')
                ->paginate(5);
        }

//        dump($prescriptions);
//        dump($prescriptions->items()[0]);

        return view('resources.doctor.prescription.show', compact('prescriptions'));
    }
}
