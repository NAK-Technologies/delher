<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;
use Str;

class QuestionAdd extends Component
{
    public $hasOptions = false;
    public $hasSubOptionsArr = [false];
    public $options = [''];
    // public $optionsCount = 0;
    public $subOptions = [];
    public $question;
    public $group;
    public $alias;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        // $this->optionsCount = count($this->options);
    }

    public function addOption()
    {
        $this->options[] = '';
        $this->hasSubOptionsArr[] = false;
    }

    public function addSubOption($option, $index = 0, $fromSub = false)
    {
        if ($fromSub || $this->hasSubOptionsArr[$index]) {

            $this->subOptions[$option][$index] = '';
        } else {
            unset($this->subOptions[$option]);
        }
        // $this->render();
    }

    public function removeOption($index)
    {
        $left = $this->options;
        $right = $this->options;
        // dd($index);
        $left = array_splice($left, 0, $index + 1);
        array_pop($left);
        $right = array_splice($right, $index + 1);

        $arr = array_merge($left, $right);
        $this->options = $arr;
        // $this->optionsCount--;
        // dd($this->options);
        // $this->render();
        // dd($left, $right, $this->options);
    }

    public function removeSubOption($option, $index)
    {
        $left = $this->subOptions[$option];
        $right = $this->subOptions[$option];
        // dd($index);
        $left = array_splice($left, 0, $index + 1);
        array_pop($left);
        $right = array_splice($right, $index + 1);

        $arr = array_merge($left, $right);
        $this->subOptions[$option] = $arr;
        // $this->optionsCount--;
        // dd($this->options);
        // $this->render();
    }

    public function store()
    {
        $this->validate([
            'group' => 'required',
            'question' => 'required',
            'alias' => 'required',
        ]);

        $group = Str::kebab($this->group);

        $q = Question::create([
            'question' => $this->question,
            'parent_id' => 0,
            'group' => $group,
            'alias' => $this->alias,
        ]);

        if ($this->hasOptions) {
            foreach ($this->options as $index => $option) {
                $o = Question::create([
                    'question' => $option,
                    'group' => $group,
                    'parent_id' => $q->id,
                ]);
                // dd($index, $this->hasSubOptionsArr);
                if ($this->hasSubOptionsArr[$index]) {
                    foreach ($this->subOptions[$option] as $si => $subOption) {
                        $so = Question::create([
                            'question' => $subOption,
                            'parent_id' => $o->id,
                            'group' => $group
                        ]);
                    }
                }
            }
        }

        if ($q) {

            toastr()->success('Question Created Successfully');
        } else {
            toastr()->error('Question Creation Failed');
        }

        $this->resetExcept();
        $this->emitSelf('refresh');
        $this->emitTo('questions.question-all', 'refresh');
    }

    public function render()
    {

        // dd($questions);
        $groups = Question::select('group')->distinct()->orderBy('group', 'asc')->get()->pluck('group');
        // dd($groups);
        return view('livewire.questions.question-add', ['groups' => $groups]);
    }
}
