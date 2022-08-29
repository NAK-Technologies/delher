<?php

namespace App\Http\Livewire;

use App\Events\UserCreated;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Str;


class UserAdd extends Component
{
    public $name;
    public $email;
    public $role;
    public $city;
    public $location;


    public function store()
    {
        if (!empty($this->name) && !empty($this->email) && !empty($this->role) && !empty($this->city) && !empty($this->location)) {

            $this->city = explode('-', $this->city)[0];
            // dd($this->city);
            // $validated->created_by = auth()->user()->id;
            $password = Str::random(10);
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'city' => $this->city,
                'location' => $this->location,
                'password' => Hash::make($password),
                'created_by' => auth()->user()->id
            ]);
            $user->password = $password;
            // dd($user);
            // event(new UserCreated($user));
            UserCreated::dispatch($user, $password);
            $this->resetExcept();
            $this->emitTo('user-all', 'render');
            toastr()->success(ucfirst($user->role) . ' ' . $user->name . ' created successfully');
        } else {
            toastr()->error('Every field must be filled');
        }
        // dd($this->name, $this->email, $this->role, $this->city, $this->location);
    }

    public function render()
    {
        $users = User::selectRaw('distinct(location)')->where('role', '!=', 'admin')->get();
        // dd($users);
        $locations = $users->pluck('location');
        $cities = City::all();
        return view('livewire.user-add', ['cities' => $cities, 'locations' => $locations]);
    }
}
