<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Patient;
use Carbon\Carbon;
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
    public $start = '';
    public $end = '';

    public function getPatientsData()
    {
        $data = [];
        $total = 0;

        $patients = Patient::whereDate('created_at', '<=', \Carbon\Carbon::today())->whereDate('created_at', '>=', \Carbon\Carbon::now()->subMonth())
            ->with(['demographic', 'answers' => function ($q) {
                return $q->whereDate('created_at', '<=', \Carbon\Carbon::today())->whereDate('created_at', '>=', \Carbon\Carbon::now()->subMonth());
            }])->get();

        foreach (range(1, Carbon::now()->subMonth()->daysInMonth) as $date) {
            if (!array_key_exists($date, $data)) {
                $data[$date]['count'] = 0;
            }
            if (!array_key_exists('types', $data)) {
                $data[$date]['types'] = [];
            }
        }

        foreach ($patients as $patient) {
            $total++;
            $date = Carbon::parse($patient->created_at)->format('d');
            // if (array_key_exists($patient->demographic->city->name, $data)) {
            if (array_key_exists($date, $data)) {
                // $data[$patient->demographic->city->name]++;
                $data[$date]['count']++;
            } else {
                // $data[$patient->demographic->city->name] = 1;
                $data[$date]['count'] = 1;
            }
            foreach ($patient->answers as $answer) {
                $type = '';
                if ($answer->question->id == 4 || $answer->question->id == 6 || $answer->question->id == 7) {
                    // dump($this->start, $this->end);
                    // $start = '';
                    // $end = '';
                    $diff = 0;

                    if ($answer->question->id == 4) {
                        $this->start = Carbon::parse($answer->answer);
                    } else if ($answer->question->id == 6) {
                        $this->end = Carbon::parse($answer->answer);
                    } else if ($answer->question->id == 7) {
                        $this->end = Carbon::parse(Carbon::now());
                    }
                    if ($this->start != '' && $this->end != '') {
                        // dump($this->start, $this->end);
                        $diff = $this->start->diffInDays($this->end);
                        // dump($diff);
                        $this->start = '';
                        $this->end = '';
                        if ($diff < 14) {
                            $type = 'Acute';
                        } else if ($diff >= 14 && $diff <= 30) {
                            $type = 'Persistent';
                        } else if ($diff > 30) {
                            $type = 'Chronic';
                        }
                    }
                }
                // dd($type);
                if (array_key_exists('types', $data[$date])) {
                    if (array_key_exists($type, $data[$date]['types']) && $type != "") {
                        $data[$date]['types'][$type]++;
                    } else {
                        if ($type != "") {
                            $data[$date]['types'][$type] = 1;
                        }
                    }
                } else {
                    $data[$date]['types'] = [];
                }
            }
        }
        // dump($patients);




        // dump($data);
        // $data = str_replace('\\"', '\\\\"', $data);
        // dd(array_multisort($data, ));
        ksort($data);
        // dump($data);
        // $data = array_slice($data, 0, 10);

        $data = json_encode($data);


        return [$data, $total];
    }

    public function getTypeData()
    {
        $patients = Answer::whereIn('id', [3, 5])->with('options', 'answers')->get();

        // dd($patients);
    }

    public function render()
    {
        $patientsData = $this->getPatientsData();
        // $this->getTypeData();
        // dd(Carbon::now()->subMonth()->daysInMonth, range(1, 31));
        // dd($patients, \Carbon\Carbon::now()->format('Y-m-d'));
        return view('livewire.daily-summary', ['patients' => $patientsData[0], 'patientsTotal' => $patientsData[1]]);
    }
}
