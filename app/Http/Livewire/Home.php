<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Home extends Component
{
    public $name;
    public $email;
    public $level;
    public $department;
    public $programme;
    public $password;
    public $open = false;
    public $advisor;
    public $adviser;
    public $dprogramme = [];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => ['required'],
        'level' => 'required',
        'department' => 'required',
        'programme' => 'required',
        'adviser' => 'required',
    ];

    public function updatedDepartment()
    {
        $this->open = true;
        // $this->advisor = User::where('department', $this->department)->get();
        $this->advisor = User::role('Advisor')->where('department', $this->department)->get();

        if ($this->department == 'Mathematical Sciences') {
            $this->dprogramme = [
                'Computer Science',
                'Mathematics',
                'Statistics',
                ];
        } elseif ($this->department == 'Biological Sciences') {
            $this->dprogramme = ['Botany',
            'Microbiology',
            'Zoology',

            ];
        }elseif ($this->department == 'Physical Sciences') {
            $this->dprogramme = ['Physics',
                'Geophysics',
            ];
        }elseif ($this->department == 'Food Sciences') {
            $this->dprogramme = [
                'Food Science and Technology',
            ];
        } elseif ($this->department == 'Agriculture Sciences') {
            $this->dprogramme = ['Agriculture Economics and Extension',
                'Animal Production & Health',
                'Crop, Soil and Pest Management',
                'Fisheries and Aquaculture',
                'Forestory, Wildlife and Environmental Management',
            ];
        }
         elseif ($this->department == 'Chemical Sciences')  {
            $this->dprogramme = ['Industial Chemistry',
                'Biochemistry',
            ];
        }else {
            $this->dprogramme = ['Civil Engineering',
                'Electrical / Electronic Engineering',
                'Mechanical Engineering',
            ];
        }
    }

    public function mount()
    {

        if (Auth::check()) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
            $this->level = auth()->user()->level;
            // $this->phone = auth()->user()->phone;
        }
    }

    public function advisory()
    {
        $userloggedin = Auth::user();

        $userexist = User::where('email', '=', $this->email)->first();

        if (!$userloggedin && $userexist === null) {

            $this->validate();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'level' => $this->level,
                'department' => $this->department,
                'programme' => $this->programme,
                'password' => Hash::make($this->password),
            ]);

            $user->assignRole('Student');

            Auth::login($user);
            session()->put('adviser', $this->adviser);
            return redirect('/messages');

        } elseif (!$userloggedin && $userexist) {

            $this->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255',
                'password' => ['required'],
                'level' => 'required',
                'department' => 'required',
                'programme' => 'required',
                'adviser' => 'required',
            ]);

            $user = ['email' => $this->email,
                'password' => $this->password,
            ];

            $login = Auth::attempt($user);

            if ($login) {

                session()->put('adviser', $this->adviser);

                return redirect('/messages');

            } else {

                session()->flash('failed', 'Password incorrect, input your correct password 😞');
            }

        } else {

            $this->validate([
                'name' => 'required',
                'email' => 'required|string|email|max:255',
                'level' => 'required',
                'department' => 'required',
                'programme' => 'required',
                'adviser' => 'required',
            ]);
            session()->put('adviser', $this->adviser);
            return redirect('/messages');
        }

    }

    public function render()
    {
        return view('livewire.home');
    }
}
