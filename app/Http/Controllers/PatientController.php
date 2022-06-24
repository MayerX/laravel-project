<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\PersonalDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $doctorId = auth()->user()['userId'];

        $patients = DB::table('personal_details as pd')
            ->join('members as m', 'm.userId', '=', 'pd.userId')
            ->select('pd.*', 'm.limited')
            ->whereIn('pd.userId', function ($query) use ($doctorId) {
                $query->select('patientid')
                    ->from('patient_doctor')
                    ->where('doctorid', $doctorId);
            })->paginate(5);

//        dd($patients);

        return view('resources.doctor.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $patientId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($patientId)
    {
        $patient = Member::query()->where('userId', $patientId)->first();
        $detail = PersonalDetail::query()->where('userId', $patientId)->first();
        $username = User::query()->where('userId', $patientId)->first()['username'];
        $doctorsId = explode(';', $patient['doctors']);
        $doctorsName = array();
        for ($i = 0; $i < count($doctorsId) - 1; $i += 1) {
            $doctorsName[] = PersonalDetail::query()->where('userId', $doctorsId[$i])->first()['name'];
        }
//        dump($doctorsName);
//        dump($patient);

        session()->put('show_status', '1');
        session()->put('patient_name', $detail['name']);
        session()->put('patient_id', $patientId);
//        session()->forget('show_status');

        return view('resources.doctor.patients.show',
            compact('patient', 'detail', 'username', 'doctorsName')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
