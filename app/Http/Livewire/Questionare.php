<?php

namespace App\Http\Livewire;

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

    public function render()
    {
        $questions = Question::where('parent_id', 0)->with(['options', 'options.options'])->get()->groupBy('group');
        // dd($questions);
        // foreach ($questions as $group) {
        //     foreach ($group as $question) {
        //         $this->addSelectable($question->id);
        //     }
        // }
        $this->questions = $questions;
        $questions = $this->questions;

        $id = 2;
        $this->patientID = $id;
        $this->patient = Patient::find($id);
        $patient = $this->patient;
        return view('livewire.questionare', compact('questions', 'patient'));
    }
}
