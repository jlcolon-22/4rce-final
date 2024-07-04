<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Customer;
use App\Models\EmployeeAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ResetPassword extends Component
{
    public $password;
    public $password_confirmation;
    public $type;
    public $id;
    public function mount($type,$id)
    {
        $this->type= $type;
        $this->id= $id;
    }
    public function changePassword()
    {
        $this->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if($this->type == 'customer')
        {
            Customer::where('id',Crypt::decryptString($this->id))->update(['password'=>Hash::make($this->password)]);

            Notification::make()
                ->title('Password reset successful! You can now log in with your new password.')
                ->success()
                ->persistent()
                ->send();
            $this->reset();
        }elseif($this->type == 'admin')
        {
            User::where('id',Crypt::decryptString($this->id))->update(['password'=>Hash::make($this->password)]);
            Notification::make()
            ->title('Password reset successful! You can now log in with your new password.')
            ->success()
            ->persistent()
            ->send();
            $this->reset();
        }elseif($this->type == 'employee')
        {
            EmployeeAccount::where('id',Crypt::decryptString($this->id))->update(['password'=>Hash::make($this->password)]);
            Notification::make()
            ->title('Password reset successful! You can now log in with your new password.')
            ->success()
            ->persistent()
            ->send();
            $this->reset();
        }
    }
    public function render()
    {
        return view('livewire.reset-password');
    }
}
