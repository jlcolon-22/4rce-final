<?php

namespace App\Livewire\Admin\Project;

use App\Models\EmployeeAccount;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Team extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\ProjectTeam::query()->with('foremanInfo')->latest())
            ->heading('Teams')
            ->headerActions([
                Action::make('add team')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([
                        TextInput::make('team_name'),
                        Toggle::make('status')->onColor(Color::Green)->default(true),
                        Select::make('foreman')->options(\App\Models\EmployeeAccount::where('position_id',1)->where('team',null)->get()->pluck('fullname','id')),
                        Select::make('members')->options(\App\Models\EmployeeAccount::where('position_id','!=',1)->where('team',null)->get()->pluck('fullname','id'))->multiple()

                    ])->action(function ($data) {
                        $x =  $data['members'];
                        $data['members'] = json_encode( $data['members']);
                        $team = \App\Models\ProjectTeam::create($data);
                        EmployeeAccount::where('id',$data['foreman'])->update([
                            'team'=>$team->id
                        ]);
                        foreach($x as $value)
                        {
                            EmployeeAccount::where('id',$value)->update([
                                'team'=>$team->id
                            ]);
                        }
                        Notification::make()
                            ->title('Created successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false)
            ])
            ->columns([
                TextColumn::make('team_name'),
                TextColumn::make('foreman')->state(fn($record)=> $record->foremanInfo?->fullname) ,
                IconColumn::make('status')
    ->boolean()
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->color(Color::Green)
                ->beforeFormFilled(function($record){

                     $record['members'] = json_decode($record->members);
                     return $record;
                })

                ->form([
                    TextInput::make('team_name'),
                    Toggle::make('status')->onColor(Color::Green)->default(true),
                    Select::make('foreman')->options(\App\Models\EmployeeAccount::where('position_id',1)->get()->pluck('fullname','id')),
                    Select::make('members')->options(\App\Models\EmployeeAccount::where('position_id','!=',1)->get()->pluck('fullname','id'))->multiple()
                ])->action(function ($data, $record) {
                    EmployeeAccount::where('id',$record['foreman'])->update([
                        'team'=>null
                    ]);
                    foreach(json_decode($record['members']) as $value)
                    {
                        EmployeeAccount::where('id',$value)->update([
                            'team'=>null
                        ]);
                    }
                    $x = $data['members'];
                    $data['members'] = json_encode( $data['members']);
                 $record->update($data);
                    EmployeeAccount::where('id',$data['foreman'])->update([
                        'team'=>$record->id
                    ]);
                    foreach($x as $value)
                    {
                        EmployeeAccount::where('id',$value)->update([
                            'team'=>$record->id
                        ]);
                    }
                    Notification::make()
                        ->title('Updated successfully')
                        ->success()
                        ->send();
                })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false),
                DeleteAction::make()->closeModalByClickingAway(false)
            ]);
    }
    public function render()
    {
        return view('livewire.admin.project.team');
    }
}
