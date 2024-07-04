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

class Profile extends Component implements HasForms, HasInfolists, HasActions
{
    use InteractsWithForms;
    use InteractsWithInfolists;
    use InteractsWithActions;

    public $data = [];
    public function mount()
    {
        $this->form->fill([
            'fullname'=>Auth::guard('customer')->user()->fullname,
            'email'=>Auth::guard('customer')->user()->email,
            'birthdate'=>Auth::guard('customer')->user()->birthdate,
            'contact'=>Auth::guard('customer')->user()->contact,
            'gender'=>Auth::guard('customer')->user()->gender,
            'address'=>Auth::guard('customer')->user()->address,
            'profile'=>Auth::guard('customer')->user()->profile,

        ]);
    }
    public function form(Form $form): Form
    {
        return $form->schema([


            FileUpload::make('profile')->image()->directory('customer'),
            Grid::make([
                'default' => 2,
                'sm' => 1,
                'md' => 2,
                '2xl' => 2,

            ])->schema([
                TextInput::make('fullname')->label('Fullname')->required(),
                TextInput::make('email')->label('Email Address'),
            ]),
            Grid::make([
                'default' => 2,
                'sm' => 1,
                'md' => 2,
                '2xl' => 2,

            ])->schema([
                DatePicker::make('birthdate')->label('Birth Date'),
                TextInput::make('contact')->label('Contact Number'),
            ]),

            Select::make('gender')->label('Gender')->options([
                'male' => 'Male',
                'female' => 'Female',
            ]),
            Textarea::make('address')->label('Complete Address'),
            TextInput::make('edit_password')->label('password')->password(true)->revealable(),



        ])->statePath('data');
    }

    public function updateCustomer()
    {
        $customer = \App\Models\Customer::where('id',Auth::guard('customer')->id())->first();
        $customer->update([
            'fullname' => $this->data['fullname'],
            'email' =>  $this->data['email'],

            'contact' => $this->data['contact'],
            'gender' => $this->data['gender'],
            'birthdate' => $this->data['birthdate'],
            'address' => $this->data['address'],
        ]);
        if(!!$this->data['edit_password'])
        {
           $customer->update([
                'password' => Hash::make($this->data['edit_password'])
            ]);
        }
        if (isset($this->form->getState()['profile'])) {
           $customer->update([
                'profile' =>  $this->form->getState()['profile']
            ]);
        }
        Notification::make()
        ->title('Updated successfully')
        ->success()
        ->send();

    }
    public function render()
    {
        return view('livewire.client.profile');
    }
}
