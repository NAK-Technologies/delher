<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Patient;
use App\Models\Question;
use Livewire\Component;

class Questionare extends Component
{
    public $patientID;
    public $answers = [];
    public $options = [];
    public $custom = [];
    // public $selectable = [];
    private $questions;
    private $patient;

    protected $listeners = ['questionare' => 'setID'];

    // public function mount()
    // {

    //     $questions = Question::where('parent_id', 0)->with(['options', 'options.options'])->get()->groupBy('group');
    //     // dd($questions);
    //     // foreach ($questions as $group) {
    //     //     foreach ($group as $question) {
    //     //         $this->addSelectable($question->id);
    //     //     }
    //     // }
    //     $this->questions = $questions;
    // }

    // public function addSelectable($id)
    // {
    //     // dump($id);
    //     $this->selectable[$id] = true;
    //     // dump($this->selectable);
    // }

    // public function toggleSelectable($id)
    // {
    //     $this->selectable[$id] = !$this->selectable[$id];
    // }

    public function setID($id)
    {
        $this->patientID = $id;
        $this->patient = Patient::find($id);
    }

    public function setOptions($qid)
    {
        // dd($qid, $this->answers[$qid]);
        $options = Question::with('options')->find($this->answers[$qid]);
        foreach ($options->options as $options) {
            // dd($options);
            $this->options[$qid][] = $options;
        }
        // dd($this->options);
    }

    public function addAnswer()
    {
        foreach ($this->answers as $qID => $answer) {
            // dump($qID, $answer, (int)$answer);
            $ans = (int) $answer;
            $a = Answer::create([
                'question_id' => gettype($ans) == 'integer' && $ans < 1900 ? $ans : $qID,
                'patient_id' => $this->patientID,
                'answer' => $ans == 0 || $ans > 1900 ? $answer : $ans,
            ]);
            // dump($a);
        }
        toastr()->success('Answer added successfully', 'Submitted');
        $this->resetExcept();
        // dd($this->answers);
    }

    public function updateAnsArr($q, $o)
    {
        // dd($op);
        if (array_key_exists($q, $this->answers) && array_key_exists($o, $this->answers[$q])) {
            unset($this->answers[$q][$o]);
        } else {
            $this->answers[$q][$o] = [];
        }
    }

    public function render()
    {
        $questions = Question::where('parent_id', 0)->with(['options', 'options.options', 'options.ques'])->get()->groupBy('group');
        // dd($questions);
        // foreach ($questions as $group) {
        //     foreach ($group as $question) {
        //         $this->addSelectable($question->id);
        //     }
        // }
        // foreach(){

        // }

        $this->questions = $questions;
        $groups = $this->questions;

        // $id = 1;
        // $this->patientID = $thisid;
        // $this->patient = Patient::find($id);
        $patient = $this->patient;
        // dd($this->test($questions));
        return view('livewire.questionare', compact('groups', 'patient'));
    }
}
