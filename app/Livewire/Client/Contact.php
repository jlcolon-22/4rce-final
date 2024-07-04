<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;

class Contact extends Component
{
    public $fullname;
    public $email;
    public $message;

    public function send()
    {
        $data = [
            'fullname'=>$this->fullname,
            'email'=>$this->email,
            'message'=>$this->message,
        ];
        Mail::to('johnloycolon22@gmail.com')->send(new ContactEmail($data));
        Notification::make()
        ->title('Submited successfully')
        ->success()
        ->send();
        $this->reset();
    }
    public function render()
    {
        return view('livewire.client.contact');
    }
}
