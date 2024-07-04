<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class Login extends Component
{
    public $email;
    public $password;
    public function userLogin()
    {

        if( Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]))
        {

            return redirect()->route('admin.dashboard');

        }

        else if (Auth::guard('employee')->attempt(['email' => $this->email, 'password' => $this->password]))
        {

            return redirect()->route('employee.home');


        }

        else if (Auth::guard('customer')->attempt(['email' => $this->email, 'password' => $this->password]))
        {

            return redirect()->route('client.homepage');

        }else{
            Notification::make()
            ->title('Wrong Credential')
            ->danger()
            ->send();
        }


    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
