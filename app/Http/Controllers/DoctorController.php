<?php

namespace App\Http\Controllers;

use App\Models\HospitalName;
use App\Models\Member;
use App\Models\MembersComment;
use App\Models\PatientDoctor;
use App\Models\PersonalDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
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
    public function index(Request $request)
    {
        $doctor = $request->session()->get('user');

        return view('resources.doctor.index', compact('doctor'));
    }

    public function show_prescription(Request $request, $patientId)
    {
        if ($request->has('startTime') && $request->has('endTime'))
        {
            $startTime = $request['startTime'];
            $endTime = $request['endTime'];

            $prescriptions = DB::table('members_comments as mc')
                ->join('personal_details as pd', 'mc.userId', 'pd.userId')
                ->select('mc.*', 'pd.name')
                ->where('mc.userId', $patientId)
                ->whereBetween('mc.time', [$startTime, $endTime])
                ->orderBy('mc.time', 'desc')
                ->paginate(5);
        }
        else
        {
            $prescriptions = DB::table('members_comments as mc')
                ->join('personal_details as pd', 'mc.userId', 'pd.userId')
                ->select('mc.*', 'pd.name')
                ->where('mc.userId', $patientId)
                ->orderBy('mc.time', 'desc')
                ->paginate(5);
        }

//        dump($prescriptions->items()[0]);

        return view('resources.doctor.prescription.show', compact('prescriptions'));
    }

    public function show_prescription_with_time(Request $request, $patientId)
    {
        $startTime = $request['startTime'];
        $endTime = $request['endTime'];

        $prescriptions = DB::table('members_comments as mc')
            ->join('personal_details as pd', 'mc.userId', 'pd.userId')
            ->select('mc.*', 'pd.name')
            ->where('mc.userId', $patientId)
            ->whereBetween('mc.time', [$startTime, $endTime])
            ->orderBy('mc.time', 'desc')
            ->paginate(5);

        return view('resources.doctor.prescription.show', compact('prescriptions'));
    }

    public function show_all_patients()
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

    public function show_patient(Request $request, $patientId)
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

        $request->session()->put('show_status', '1');
        $request->session()->put('patient_name', $detail['name']);
        $request->session()->put('patient_id', $patientId);
//        session()->forget('show_status');

        return view('resources.doctor.patients.show',
            compact('patient', 'detail', 'username', 'doctorsName')
        );
    }

    public function quit_patient()
    {
        session()->forget('show_status');
        session()->forget('patient_name');
        session()->forget('patient_id');
//        session()->invalidate();
//        session()->regenerate();

//        return Redirect::to('doctor/patients');
    }

    public function add_patient()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
