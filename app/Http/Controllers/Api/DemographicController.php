<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DemographicResource;
use App\Http\Resources\PatientResource;
use App\Models\Demographic;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DemographicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $values = Demographic::getEveryEnumValues();
        return response($values);
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
        $request->validate([
            'patient_id' => 'required',
            'dob' => 'required|string',
            'city_id' => 'required',
            'area' => 'required|string',
            'street' => 'nullable|string',
            'house_no' => 'nullable|string',
            'education' => 'required|string',
            'visit_type' => 'required|string',
            'exclusively_breastfed' => 'required|boolean'
        ]);

        $patient = Patient::where('id', $request->patient_id)->first();
        // dump($patient);
        // exit();
        // $patient = Patient::doesntHave('demographic')->where('mr_no', $request->mr_no)->firstOrFail();
        // $patient->demographic()->create([]);
        if (!$patient->demographic()->exists()) {
            // dump($patient);
            // exit();
            // $patient = $patient->first();
            $patient = $patient->demographic()->create([
                'dob' => \Carbon\Carbon::parse($request->dob),
                'city_id' => (int)$request->city_id,
                'area' => $request->area,
                'street' => $request->street ?? null,
                'house_no' => $request->house_no ?? null,
                'education' => $request->education,
                'occupation' => $request->occupation,
                'visit_type' => $request->visit_type,
                'exclusively_breastfed' => (bool)$request->exclusively_breastfed,
            ]);
            // return response(json_encode(['Data saved successfully'));
            return new DemographicResource($patient);
        } else {
            $message = [
                'message' => "Patient's demographics already exists",
                'status' => 'failed'
            ];
            // return response(json_encode("Patient's demographics already exists"));
        }

        return json_encode($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demographic  $demographic
     * @return \Illuminate\Http\Response
     */
    public function show(Demographic $demographic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demographic  $demographic
     * @return \Illuminate\Http\Response
     */
    public function edit(Demographic $demographic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demographic  $demographic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demographic $demographic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demographic  $demographic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demographic $demographic)
    {
        //
    }
}
