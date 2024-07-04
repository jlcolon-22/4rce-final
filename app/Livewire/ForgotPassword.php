<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Customer;
use App\Models\EmployeeAccount;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Filament\Notifications\Notification;

class ForgotPassword extends Component
{
    public $email;
    public function checkEmail()
    {

        $checkAdmin = User::where('email', $this->email)->first();
        $checkCustomer = Customer::where('email', $this->email)->first();
        $checkEmployee = EmployeeAccount::where('email', $this->email)->first();
        if ($checkAdmin) {
            $link = route('client.reset.password', ['type' => 'admin', 'id' => Crypt::encryptString($checkAdmin->id)]);
            Mail::to($this->email)->send(new ResetPasswordEmail($link));
            Notification::make()
                ->title('A password reset link has been sent to your email account. Please check your inbox!')
                ->success()
                ->persistent()
                ->send();
            $this->reset();
        } elseif ($checkCustomer) {

            $link = route('client.reset.password', ['type' => 'customer', 'id' => Crypt::encryptString($checkCustomer->id)]);
            Mail::to($this->email)->send(new ResetPasswordEmail($link));
            Notification::make()
                ->title('A password reset link has been sent to your email account. Please check your inbox!')
                ->success()
                ->persistent()
                ->send();
            $this->reset();
        } elseif ($checkEmployee) {
            $link = route('client.reset.password', ['type' => 'employee', 'id' => Crypt::encryptString($checkEmployee->id)]);
            Mail::to($this->email)->send(new ResetPasswordEmail($link));
            Notification::make()
                ->title('A password reset link has been sent to your email account. Please check your inbox!')
                ->success()
                ->persistent()
                ->send();
            $this->reset();
        } else {
            Notification::make()
                ->title('This email address is not registered.')
                ->danger()
                ->send();
        }
    }
    public function render()
    {
        return view('livewire.forgot-password');
    }
}
