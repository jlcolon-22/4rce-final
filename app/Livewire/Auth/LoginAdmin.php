<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class LoginAdmin extends Component
{
    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $password;
    public function login()
    {
        $this->validate();

        if(Auth::guard('web')->attempt(['email'=>$this->email,'password'=>$this->password]))
        {
            $this->redirectRoute('admin.dashboard');
        }
    }
    #[Title('Admin Login')]
    public function render()
    {
        return view('livewire.auth.login-admin');
    }
}
