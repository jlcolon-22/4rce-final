<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;

class Setting extends Component
{
    public $name;
    public $email;
    public $password;

    public function mount()
    {
        $this->name = Auth::guard('web')->user()->name;
        $this->email = Auth::guard('web')->user()->email;
    }
    public function updateAdmin()
    {
        if(!!$this->password)
        {
            User::where('id',Auth::guard('web')->id())->update([
                'email'=>$this->email,
                'name'=>$this->name,
                'password'=>Hash::make($this->password),
            ]);
        }else{
            User::where('id',Auth::guard('web')->id())->update([
                'email'=>$this->email,
                'name'=>$this->name,
            ]);
        }
        Notification::make()
        ->title('Updated successfully')
        ->success()
        ->send();
    }
    public function render()
    {
        return view('livewire.admin.setting');
    }
}
