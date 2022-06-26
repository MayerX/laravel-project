<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index($patientId)
    {

        $guideIP = Member::query()->where('memberId', $patientId)->first()['VideoGuideIP'];

        return view('resources.doctor.guide.index', compact('guideIP'));
    }

    public function update(Request $request, $patientId)
    {

        $patient = Member::query()->where('memberId', $patientId)->first();
        $patient['VideoGuideIP'] = $request['guideIP'];
        $res = $patient->save();

        if ($res){
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
}
