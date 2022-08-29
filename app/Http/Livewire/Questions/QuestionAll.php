<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;

class QuestionAll extends Component
{
    public $search = '';
    public $all = false;

    protected $listeners = ['refresh' => 'render'];

    public function toggleActive($id)
    {
        $q = Question::findOrFail($id);
        $q->is_active = !$q->is_active;
        $q->save();
    }

    public function render()
    {
        $questions = Question::search($this->search, $this->all)->get()->groupBy('group');
        // dd($questions);
        return view('livewire.questions.question-all', ['questions' => $questions]);
    }
}
