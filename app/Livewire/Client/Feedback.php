<?php

namespace App\Livewire\Client;

use Livewire\Component;


use App\Models\UserInfo;
use Filament\Forms\Form;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Builder\Block;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Forms\Concerns\InteractsWithForms;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Filament\Actions\Concerns\InteractsWithActions;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;

class Feedback extends Component implements HasForms, HasInfolists, HasActions
{
    use InteractsWithForms;
    use InteractsWithInfolists;
    use InteractsWithActions;

    public $data = [];
    public function mount()
    {
        $check = \App\Models\Feedback::where('customer_id', Auth::guard('customer')->id())->first();
        if ($check) {
            $this->form->fill([
                'feedback'=> $check->feedback,
                'rating'=> $check->rating,


            ]);
        } else {
            $this->form->fill([
            'feedback'=>'',
            'rating'=>'',
        ]);
        }

    }
    public function form(Form $form): Form
    {
        return $form->schema([


            RatingStar::make('rating')
                ->label('Rating'),
            Textarea::make('feedback'),




        ])->statePath('data');
    }
    public function updateCustomer()
    {
        $check = \App\Models\Feedback::where('customer_id', Auth::guard('customer')->id())->first();
        if ($check) {
            $check->update([
                'rating' => $this->data['rating'],
                'feedback' => $this->data['feedback'],
            ]);
        } else {
            \App\Models\Feedback::create([
                'rating' => $this->data['rating'],
                'feedback' => $this->data['feedback'],
                'customer_id' => Auth::guard('customer')->id(),
            ]);
        }


        Notification::make()
            ->title('Submited successfully')
            ->success()
            ->send();
    }
    public function render()
    {

        return view('livewire.client.feedback');
    }
}
