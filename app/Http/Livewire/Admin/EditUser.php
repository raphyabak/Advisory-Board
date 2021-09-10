<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $name;
    public $email;
    public $level;
    public $department;
    public $programme;
    public $password;
    public $role;
    public $roles;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|string|email|max:255',
        // 'password' => ['required'],
        'role' => 'required',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);

    // }

    public function mount()
    {

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->level = $this->user->level;
        $this->department = $this->user->department;
        $this->programme = $this->user->programme;
        $this->role = $this->user->getRoleNames();
        // dd($this->role->permissions);
    }

    public function editUser()
    {

        $this->validate();

        if ($this->password) {

            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'level' => $this->level,
                'department' => $this->department,
                'programme' => $this->programme,
                'password' => Hash::make($this->password),
            ]);

        } else {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'level' => $this->level,
                'department' => $this->department,
                'programme' => $this->programme,
            ]);

        }

        $this->user->syncRoles($this->role);

        session()->flash('success', 'User Updated Successfully 😃');

        $this->emit('updatedUser');
    }

    public function render()
    {
        return view('livewire.admin.edit-user');
    }
}
