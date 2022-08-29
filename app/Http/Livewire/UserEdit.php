<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $role;
    public $city;
    public $location;
    public $user;

    protected $listeners = ['edit', 'deselect'];

    public function deselect()
    {
        $this->emitTo('user-all', 'deselect');
        return $this->reset();
    }

    public function edit(User $user)
    {
        $this->emitTo('user-all', 'select', $user->id);
        $this->emitTo('user-all', 'render');
        if ($this->user != null && $this->user->id == $user->id) {
            $this->deselect();
            return false;
        }

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->location = $user->location;
        $this->city = $user->city()->first()->id . '-' . $user->city()->first()->name;
        $this->user = $user;
        // dd($this->user);
        $this->render();
    }

    public function update(User $user)
    {
        if (!empty($this->name) && !empty($this->email) && !empty($this->role) && !empty($this->city) && !empty($this->location)) {

            $user->name = $this->name;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->city = explode('-', $this->city)[0];
            $user->location = $this->location;
            // dd($user);
            if ($user->update()) {
                toastr()->success($user->name . '\'s data updated successfully');
            } else {
                toastr()->error($user->name . '\'s data update failed');
            }

            $this->emitTo('user-all', 'render');
        } else {
            toastr()->error('All fields must be filled.');
        }
        // $this->dispatchBrowserEvent(
        //     'alert',
        //     ['type' => 'success',  'message' => $user->name . '\'s Data Updated Successfully.']
        // );
    }

    public function render()
    {
        $users = User::selectRaw('distinct(location)')->where('role', '!=', 'admin')->get();
        // dd($users);
        $locations = $users->pluck('location');
        $cities = City::all();
        return view('livewire.user-edit', ['cities' => $cities, 'locations' => $locations]);
    }
}
