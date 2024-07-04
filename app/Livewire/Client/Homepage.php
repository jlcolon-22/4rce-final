<?php

namespace App\Livewire\Client;

use App\Enums\ProjectStatusEnum;
use Livewire\Component;
use App\Mail\ContactEmail;
use App\Models\Project;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;

class Homepage extends Component
{
    public $fullname;
    public $email;
    public $message;

    public function send()
    {
        $data = [
            'fullname' => $this->fullname,
            'email' => $this->email,
            'message' => $this->message,
        ];
        Mail::to('johnloycolon22@gmail.com')->send(new ContactEmail($data));
        Notification::make()
            ->title('Submited successfully')
            ->success()
            ->send();
        $this->reset();
    }
    #[Title('Homepage')]
    public function render()
    {
        $latests = Project::where('status',ProjectStatusEnum::FINISHED->value)->limit(3)->get();
        $feedbacks = \App\Models\Feedback::with('customerInfo')->get();
        return view('livewire.client.homepage',compact('latests','feedbacks'));
    }
}
