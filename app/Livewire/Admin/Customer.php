<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Table;
use Livewire\Attributes\Title;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Models\Customer as ModelCustomer;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;

class Customer extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(ModelCustomer::query()->latest())
            ->headerActions([
                Action::make('Add Customer')->icon('heroicon-o-plus')->color(Color::Green)
                ->form([
                    FileUpload::make('profile')->image()->directory('customer'),
                    Grid::make([
                        'default' => 2,
                        'sm' => 1,
                        'md' => 2,
                        '2xl' => 2,

                    ])->schema([
                        TextInput::make('fullname')->label('Fullname')->required(),
                        TextInput::make('email')->label('Email Address')->email()->required()->unique('customers', 'email'),
                    ]),
                    Grid::make([
                        'default' => 2,
                        'sm' => 1,
                        'md' => 2,
                        '2xl' => 2,

                    ])->schema([
                        DatePicker::make('birthdate')->label('Birth Date')->required(),
                        TextInput::make('contact')->label('Contact Number')->required(),
                    ]),

                    Select::make('gender')->label('Gender')->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->required(),
                    Textarea::make('address')->label('Complete Address')->required(),
                    TextInput::make('password')->password(true)->revealable()->required(),
                ])->action(function ($data) {
                    $customer = ModelCustomer::create([
                        'fullname' => $data['fullname'],
                        'email' =>  $data['email'],
                        'password' => Hash::make('password'),
                        'contact' => $data['contact'],
                        'gender' => $data['gender'],
                        'birthdate' => $data['birthdate'],
                        'address' => $data['address'],
                    ]);

                    if (!!$data['profile']) {
                        $customer->update([
                            'profile' => $data['profile']
                        ]);
                    }

                    Notification::make()
                        ->title('Created successfully')
                        ->success()
                        ->send();
                })->modalWidth(MaxWidth::ExtraLarge)
            ])
            ->heading('Customer Account')
            ->columns([
                TextColumn::make('fullname')->searchable(),
            ])->paginationPageOptions([ '5', '10', '20'])
            ->actions([
                EditAction::make()->color(Color::Green) ->form([
                    FileUpload::make('profile')->image()->directory('customer'),
                    Grid::make([
                        'default' => 2,
                        'sm' => 1,
                        'md' => 2,
                        '2xl' => 2,

                    ])->schema([
                        TextInput::make('fullname')->label('Fullname')->required(),
                        TextInput::make('email')->label('Email Address')->email()->required(),
                    ]),
                    Grid::make([
                        'default' => 2,
                        'sm' => 1,
                        'md' => 2,
                        '2xl' => 2,

                    ])->schema([
                        DatePicker::make('birthdate')->label('Birth Date')->required(),
                        TextInput::make('contact')->label('Contact Number')->required(),
                    ]),

                    Select::make('gender')->label('Gender')->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->required(),
                    Textarea::make('address')->label('Complete Address')->required(),
                    TextInput::make('edit_password')->password(true)->revealable(),
                ])->action(function ($data,$record) {
                    $customer = $record->update([
                        'fullname' => $data['fullname'],
                        'email' =>  $data['email'],

                        'contact' => $data['contact'],
                        'gender' => $data['gender'],
                        'birthdate' => $data['birthdate'],
                        'address' => $data['address'],
                    ]);
                    if(!!$data['edit_password'])
                    {
                        $record->update([
                            'password' => Hash::make('edit_password'),
                        ]);
                    }
                    if (!!$data['profile']) {
                        $record->update([
                            'profile' => $data['profile']
                        ]);
                    }

                    Notification::make()
                        ->title('Updated successfully')
                        ->success()
                        ->send();
                })->modalWidth(MaxWidth::ExtraLarge),
                DeleteAction::make()->color(Color::Red),
            ]);
    }
    #[Title('Customer - Admin')]
    public function render()
    {

        return view('livewire.admin.customer');
    }
}
