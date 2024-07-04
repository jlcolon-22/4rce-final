<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;

class Register extends Component
{
    public $fullname;
    public $email;
    public $password;
    public $confirm_password;
    public function sign_up()
    {

        $this->validate([
            'fullname'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:8',
            'confirm_password'=>'required'

        ]);
            Customer::query()->create([
                'fullname'=>ucfirst($this->fullname),
                'email'=>$this->email,
                'password'=>Hash::make($this->password)
            ]);
            Notification::make()
            ->title('Created successfully')
            ->success()
            ->send();
            $this->reset();
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
