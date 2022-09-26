<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Arr;
use Livewire\Component;


// function sortM($arr)
// {
//     asort()
//     foreach($arr as $key => $el){

//     }
//     return 'hi';
// }

class DailySummary extends Component
{
    public function render()
    {
        $data = [];
        $total = 0;

        $patients = Patient::whereDate('created_at', \Carbon\Carbon::today())
            ->with('demographic')->get();

        foreach ($patients as $patient) {
            $total++;
            if (array_key_exists($patient->demographic->city->name, $data)) {
                $data[$patient->demographic->city->name]++;
            } else {
                $data[$patient->demographic->city->name] = 1;
            }
        }
        // $data = str_replace('\\"', '\\\\"', $data);
        // dd(array_multisort($data, ));
        arsort($data);
        $data = array_slice($data, 0, 10);

        $data = json_encode($data);
        // dd($patients, \Carbon\Carbon::now()->format('Y-m-d'));
        return view('livewire.daily-summary', ['patients' => $data, 'total' => $total]);
    }
}
