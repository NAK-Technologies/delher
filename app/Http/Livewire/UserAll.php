<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserAll extends Component
{
    public $search = '';
    public $all = false;
    public $selected;

    protected $listeners = ['render', 'select', 'deselect'];

    public function select($id)
    {
        $this->selected = $id;
    }

    public function deselect()
    {
        $this->selected = null;
    }

    public function toggleAll()
    {
        $this->all = !$this->all;
        // $this->emit('refresh');
        // dd('working');
        $this->deselect();
        $this->emitTo('user-edit', 'deselect');
    }

    public function edit(User $user)
    {
        $this->emitTo('user-edit', 'edit', $user);
    }

    public function render()
    {
        $users = User::search($this->search, $this->all)->with('city')->get();

        return view('livewire.user-all', ['users' => $users]);
    }
}
