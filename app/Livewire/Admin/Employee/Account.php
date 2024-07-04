<?php

namespace App\Livewire\Admin\Employee;

use Livewire\Component;
use Filament\Tables\Table;
use App\Models\EmployeePosition;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Account extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\EmployeeAccount::query()->with('position')->latest())
            ->heading('Accounts')
            ->headerActions([
                Action::make('add Employee')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([
                        FileUpload::make('profile')->image()->directory('employee'),
                        Grid::make([
                            'default' => 2,
                            'sm' => 1,
                            'md' => 2,
                            '2xl' => 2,

                        ])->schema([
                            TextInput::make('fullname')->label('Fullname')->required(),
                            TextInput::make('email')->label('Email Address')->email()->required()->unique('employee_accounts', 'email'),
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
                        Grid::make([
                            'default' => 2,
                            'sm' => 1,
                            'md' => 2,
                            '2xl' => 2,

                        ])->schema([
                            Select::make('gender')->label('Gender')->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ])->required(),
                            Select::make('position_id')->label('Position')->options(EmployeePosition::all()->pluck('position_name', 'id'))->required(),
                        ]),


                        Textarea::make('address')->label('Complete Address')->required(),
                        TextInput::make('password')->password(true)->revealable()->required(),
                    ])->action(function($data){
                        $customer = \App\Models\EmployeeAccount::create([
                            'fullname' => $data['fullname'],
                            'email' =>  $data['email'],
                            'password' => Hash::make('password'),
                            'contact' => $data['contact'],
                            'gender' => $data['gender'],
                            'birthdate' => $data['birthdate'],
                            'address' => $data['address'],
                            'position_id'=>$data['position_id']
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

                    })->modalWidth(MaxWidth::ExtraLarge)->closeModalByClickingAway(false)
            ])
            ->columns([
                ImageColumn::make('profile') ->circular(),
                TextColumn::make('fullname')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('team'),
                TextColumn::make('position')->state(function($record){
                    return $record->position?->position_name;
                })->color(Color::Fuchsia)->badge(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->color(Color::Green)
                ->form([
                    FileUpload::make('profile')->image()->directory('employee'),
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
                    Grid::make([
                        'default' => 2,
                        'sm' => 1,
                        'md' => 2,
                        '2xl' => 2,

                    ])->schema([
                        Select::make('gender')->label('Gender')->options([
                            'male' => 'Male',
                            'female' => 'Female',
                        ])->required(),
                        Select::make('position_id')->label('Position')->options(EmployeePosition::all()->pluck('position_name', 'id'))->required(),
                    ]),


                    Textarea::make('address')->label('Complete Address')->required(),
                    TextInput::make('edit_password')->password(true)->revealable(),
                ])->action(function($data,$record){
                   $record->update([
                        'fullname' => $data['fullname'],
                        'email' =>  $data['email'],

                        'contact' => $data['contact'],
                        'gender' => $data['gender'],
                        'birthdate' => $data['birthdate'],
                        'address' => $data['address'],
                        'position_id'=>$data['position_id']
                    ]);
                    if(!!$data['edit_password'])
                    {

                        $record->update([
                            'password' => Hash::make($data['edit_password']),
                        ]);
                    }
                    if (!!$data['profile']) {

                        $record->update([
                            'profile' => $data['profile']
                        ]);
                    }

                    Notification::make()
                        ->title('Created successfully')
                        ->success()
                        ->send();

                })->modalWidth(MaxWidth::ExtraLarge)->closeModalByClickingAway(false),
                DeleteAction::make()->closeModalByClickingAway(false)
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.admin.employee.account');
    }
}
