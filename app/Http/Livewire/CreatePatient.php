<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePatient extends Component
{
    public $data = [];
    public $dob;
    public $firstname;
    public $lastname;
    public $father_name;
    public $mother_name;
    public $contact;
    public $nic;
    public $city;
    public $occupation;
    public $education;
    public $breastfed;
    public $visit_type;


    public function store()
    {
        $user = Auth::user();
        // dd($this->data);
        // dd($this->sanitizedPatient());

        $patient = Patient::where('mr_no', $this->sanitizedPatient()['mr_no'])->with('demographics')->first();

        // dd($patient);

        if (!$patient) {

            $patient = $user->patients()->create($this->sanitizedPatient());
            if ($patient)
                toastr()->success('Patient has been created successfully', 'Patient Created');
        }
        // else {
        //     $this->firstname = $patient->first_name;
        //     $this->lastname = $patient->last_name;
        //     $this->father_name = $patient->father_name;
        //     $this->mother_name = $patient->mother_name;
        //     $this->contact = $patient->contact;
        //     $this->nic = $patient->cnic;
        // }

        $demographic = $patient->demographic()->create($this->sanitizedDemographics());
        // dd($demographic->patient->id);
        if ($demographic) {
            toastr()->success('Demographics for the patient has been created successfully', 'Demographics Created');
            $this->emit('questionare', $demographic->patient->id);
        }

        // Patient::create($this->sanitizedPatient());
    }

    public function sanitizedPatient()
    {
        return [
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'contact' => $this->contact,
            'cnic' => $this->nic,
            'mr_no' => $this->nic ?: $this->contact
        ];
    }

    public function sanitizedDemographics()
    {
        return [
            'dob' => $this->dob,
            'city_id' => explode('-', $this->city)[0],
            'education' => $this->education,
            'occupation' => $this->occupation,
            'exclusively_breastfed' => $this->breastfed == 'yes' ? true : false,
            'visit_type' => $this->visit_type,
        ];
    }

    public function render()
    {
        $cities = City::all();
        return view('livewire.create-patient', compact('cities'));
    }
}
