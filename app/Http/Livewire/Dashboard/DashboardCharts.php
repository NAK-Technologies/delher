<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Demographic;
use App\Models\Question;
use Carbon\Carbon;
use Livewire\Component;

class DashboardCharts extends Component
{
    public $selected = '';
    // public $c2;

    protected $listeners = ['lc'];

    public function selected($q)
    {
        $this->selected = $q;
    }

    public function lc()
    {
        $c1 = $this->chart_1();
        $c2 = $this->chart_2();
        $c3 = $this->chart_3();
        $c4 = $this->chart_4();

        $this->emit('loadCharts', ['c1' => $c1, 'c2' => $c2['data'], 'c3' => $c3['data'], 'c4' => $c4['data']]);

        return ['c1' => $c1, 'c2' => $c2['all'], 'c3' => $c3['all'], 'c4' => $c4['all']];


        // $charts = Question::where('is_active', true)->where('parent_id', 0)->with('options')->with('options.options')->with('options.answers')->get()->groupBy('group');

        // $this->emit('loadCharts', $charts);

        // return $charts;
    }

    public function chart_1()
    {
        $cities = [];
        $age = [];
        $occupation = [];


        $demographics = Demographic::all();
        foreach ($demographics as $demographic) {
            if (!isset($cities[$demographic->city->name])) {
                $cities[$demographic->city->name] = 1;
            } else {
                $cities[$demographic->city->name]++;
            }
            if (!isset($occupation[$demographic->occupation])) {
                $occupation[$demographic->occupation] = 1;
            } else {
                $occupation[$demographic->occupation]++;
            }
            if (!isset($age[Carbon::parse($demographic->dob)->diffInYears(Carbon::now())])) {
                $age[Carbon::parse($demographic->dob)->diffInYears(Carbon::now())] = 1;
            } else {
                $age[Carbon::parse($demographic->dob)->diffInYears(Carbon::now())]++;
            }
            // if (!isset($occupation[$demographic->occupation])) {
            //     $occupation[$demographic->occupation] = 1;
            // } else {
            //     $occupation[$demographic->occupation]++;
            // }
        }


        // $bigData = [1, 5, 19, 105, 39, 55, 200];
        return $bigData = [
            'cities' => $cities,
            'label' => 'patients',
            'age' => $age,
            'occupation' => $occupation
        ];
        // $this->dispatchBrowserEvent('test', $data);
        // $this->emit('chart_1', $bigData);
    }

    public function chart_2()
    {
        // $w = [];
        // $t = [];
        // $a = [];
        // $s = [];
        // $water = Question::where('question', 'drinking water (home)')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $toilet = Question::where('question', 'Type of latrine')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $animals = Question::where('question', 'Animals at home')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $soap = Question::where('question', 'Regular soap use')->where('is_active', true)->with('options')->with('options.answers')->first();
        // dd($animals);
        $group = Question::where('group', 'lifestyle')->where('parent_id', 0)->where('is_active', true)
            ->where(function ($q) {
                // dd($q);
                return $q
                    ->whereHas('options', function ($q) {
                        return $q
                            ->WhereHas('options', function ($q) {
                                return $q
                                    ->whereHas('answers');
                            })
                            ->orWhereHas('answers');
                    })
                    ->orWhereHas('answers');
            })
            ->with(['options', 'options.options', 'answers', 'options.answers'])
            ->get();
        // dd($lifestyle);
        // need to make loop of animals
        // if ($soap != null) {
        //     foreach ($soap->options as $option) {

        //         $s[$option->question] = 0;
        //         foreach ($option->answers as $answer) {
        //             if ($answer->isNotEmpty) {
        //                 $s[$option->question]++;
        //             }
        //         }
        //     }
        // }
        // if ($animals != null) {
        //     foreach ($animals->options as $option) {

        //         $a[$option->question] = 0;
        //         foreach ($option->answers as $answer) {
        //             if ($answer->isNotEmpty) {
        //                 $a[$option->question]++;
        //             }
        //         }
        //     }
        // }
        // foreach ($water->options as $option) {

        //     $w[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $w[$option->question]++;
        //         }
        //     }
        // }
        // foreach ($toilet->options as $option) {

        //     $t[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $t[$option->question]++;
        //         }
        //     }
        // }
        $data = [];
        foreach ($group as $question) {
            foreach ($question->options as $option) {
                if (isset($data[$question->question][$option->question])) {
                    if ($option->answers->isNotEmpty()) {
                        $data[$question->question][$option->question]++;
                    }
                } else {
                    // dd($option->answers);
                    if ($option->answers->isNotEmpty()) {
                        $data[$question->question][$option->question] = 1;
                    } else {
                        $data[$question->question][$option->question] = 0;
                    }
                }
            }
        }
        // dd($data);
        // return $data = ['water' => $w, 'toilet' => $t, 'animals' => $a, 'soap' => $s];
        return ['data' => $data, 'all' => $group];
        // dd($data);
        // $this->emit('chart_2', $data);
    }

    public function chart_3()
    {
        // $meds = [];
        // $comp = [];
        // $trans = [];

        // $medications = Question::where('question', 'Medications currently in use')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $compliance = Question::where('question', 'Compliance to medicines')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $BloodTransfusion = Question::where('question', 'Blood Transfusion')->where('is_active', true)->with('options')->with('options.answers')->first();
        // // dd($medications);
        // foreach ($medications->options as $option) {

        //     $meds[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $meds[$option->question]++;
        //         }
        //     }
        // }
        // foreach ($compliance->options as $option) {
        //     // dump($comp);
        //     // dump($option);
        //     $comp[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $comp[$option->question]++;
        //         }
        //     }
        // }
        // foreach ($BloodTransfusion->options as $option) {
        //     // dump($comp);
        //     // dump($option);
        //     $trans[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $trans[$option->question]++;
        //         }
        //     }
        // }

        $group = Question::where('group', 'treatment-history')->where(
            'parent_id',
            0
        )->where('is_active', true)
            ->where(function ($q) {
                // dd($q);
                return $q
                    ->whereHas('options', function ($q) {
                        return $q
                            ->WhereHas('options', function ($q) {
                                return $q
                                    ->whereHas('answers');
                            })
                            ->orWhereHas('answers');
                    })
                    ->orWhereHas('answers');
            })
            ->with(['options', 'options.options', 'answers', 'options.answers'])
            ->get();


        $data = [];
        foreach ($group as $question) {
            foreach ($question->options as $option) {
                if (isset($data[$question->question][$option->question])) {
                    if ($option->answers->isNotEmpty()) {
                        $data[$question->question][$option->question]++;
                    }
                } else {
                    // dd($option->answers);
                    if ($option->answers->isNotEmpty()) {
                        $data[$question->question][$option->question] = 1;
                    } else {
                        $data[$question->question][$option->question] = 0;
                    }
                }
            }
        }
        // dd($data);
        // return $data = ['water' => $w, 'toilet' => $t, 'animals' => $a, 'soap' => $s];
        return ['data' => $data, 'all' => $group];

        // return $data = [
        //     'medications' => $meds,
        //     'compliance' => $comp,
        //     'transfusion' => $trans,
        // ];
        // $this->emit('chart_3', $data);
    }
    public function chart_4()
    {
        // $meds = [];
        // $comp = [];
        // $trans = [];

        // $medications = Question::where('question', 'Medications currently in use')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $compliance = Question::where('question', 'Compliance to medicines')->where('is_active', true)->with('options')->with('options.answers')->first();
        // $BloodTransfusion = Question::where('question', 'Blood Transfusion')->where('is_active', true)->with('options')->with('options.answers')->first();
        // // dd($medications);
        // foreach ($medications->options as $option) {

        //     $meds[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $meds[$option->question]++;
        //         }
        //     }
        // }
        // foreach ($compliance->options as $option) {
        //     // dump($comp);
        //     // dump($option);
        //     $comp[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $comp[$option->question]++;
        //         }
        //     }
        // }
        // foreach ($BloodTransfusion->options as $option) {
        //     // dump($comp);
        //     // dump($option);
        //     $trans[$option->question] = 0;
        //     foreach ($option->answers as $answer) {
        //         if ($answer->isNotEmpty) {
        //             $trans[$option->question]++;
        //         }
        //     }
        // }

        $group = Question::where('group', 'family-history')->where(
            'parent_id',
            0
        )->where('is_active', true)
            ->where(function ($q) {
                // dd($q);
                return $q
                    ->whereHas('options', function ($q) {
                        return $q
                            ->WhereHas('options', function ($q) {
                                return $q
                                    ->whereHas('answers');
                            })
                            ->orWhereHas('answers');
                    })
                    ->orWhereHas('answers');
            })
            ->with(['options', 'options.options', 'answers', 'options.answers'])
            ->get();


        $data = [];
        foreach ($group as $question) {
            foreach ($question->options as $option) {
                if (isset($data[$question->question][$option->question])) {
                    if ($option->answers->isNotEmpty()) {
                        $data[$question->question][$option->question]++;
                    }
                } else {
                    // dd($option->answers);
                    if ($option->answers->isNotEmpty()) {
                        $data[$question->question][$option->question] = 1;
                    } else {
                        $data[$question->question][$option->question] = 0;
                    }
                }
            }
        }
        // dd($data);
        // return $data = ['water' => $w, 'toilet' => $t, 'animals' => $a, 'soap' => $s];
        return ['data' => $data ?? [], 'all' => $group];

        // return $data = [
        //     'medications' => $meds,
        //     'compliance' => $comp,
        //     'transfusion' => $trans,
        // ];
        // $this->emit('chart_3', $data);
    }

    public function render()
    {
        // $this->dispatchBrowserEvent('bigChartLoad', ['data' => [1, 2, 3, 50]]);
        // $this->dispatchBrowserEvent('test');
        // $charts = $this->lc();
        // return view('livewire.dashboard.dashboard-charts', ['charts' => $charts]);

        $arr = $this->lc();


        return view('livewire.dashboard.dashboard-charts', compact('arr'));
    }
}
