<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = auth()->user()->patients;
        // dump($patients->toArray());
        // return $patients;
        $data = [];
        foreach ($patients as $patient) {
            array_push($data, new PatientResource($patient));
        }
        return response($data);
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
        // dump($request->has('mr_no'));
        if ($request->has('mr_no')) {
            return $this->update($request, Patient::where('mr_no', $request->mr_no)->first());
        }

        $r = $request->validate([
            'first_name' => 'required|string|max:32',
            'middle_name' => 'string|max:32',
            'last_name' => 'required|string|max:32',
            'father_name' => 'string|max:32',
            'mother_name' => 'string|max:32',
            'cnic' => empty($request->contact) ? 'required|numeric|digits:13|unique:patients,cnic' : 'numeric|digits:13|unique:patients,cnic',
            'contact' => empty($request->cnic) ? 'required|numeric|digits:11|unique:patients,contact' : 'numeric|unique:patients,contact|digits:11',
        ]);

        $data = [
            'mr_no' => isset($r['cnic']) ? $r['cnic'] : $r['contact'],
            'first_name' => $r['first_name'],
            'middle_name' => $r['middle_name'] ?? '',
            'last_name' => $r['last_name'],
            'father_name' => $r['father_name'] ?? '',
            'mother_name' => $r['mother_name'] ?? '',
            'cnic' => $r['cnic'] ?? '',
            'contact' => $r['contact'] ?? ''
        ];


        // $request->user()->patients()->create([
        //     'mr_no' => $r['nic'] ? $r['nic'] : $r['contact'],
        //    'fullname' => $r['fullname'],
        //    'father_name' => $r['father_name'] ?? '',
        //    'mother_name' => $r['mother_name'] ?? '',
        //    'nic' => $r['nic'],
        //    'contact' => $r['contact']
        // ]);
        //return dump($request->all());
        // dump($request->user());
        if ($patient =  $request->user()->patients()->create($data)) {
            return new PatientResource($patient);
        } else {
            return json_encode(['message' => 'Patient not found', 'status' => 'failed']);
        }
        //dump($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function checkMR(Request $request)
    {
        $patient = Patient::where('mr_no', $request->mr_no)->first();
        // return response($patient != null ? true : 'false');
        return $patient != null ? json_encode($patient) : json_encode(['message' => 'Patient not found', 'status' => 'failed']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $r = $request->validate([
            'first_name' => 'required|string|max:32',
            'middle_name' => 'string|max:32',
            'last_name' => 'required|string|max:32',
            'father_name' => 'string|max:32',
            'mother_name' => 'string|max:32',
            $patient->mr_no == $request->contact ? '' : 'contact' => 'required|numeric|digits:11|unique:patients,contact'
        ]);

        $p = $patient->update($r);
        return json_encode($p);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function myPatients(Request $request)
    {
        // return response($user->patients);
        return response($request->user()->patients);
    }

    public function patient(Patient $patient)
    {
        return response($patient);
    }
}
