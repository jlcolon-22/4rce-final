<?php

namespace App\Livewire\Admin\Employee;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Position extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\EmployeePosition::query()->latest())
            ->heading('Positions')
            ->headerActions([
                Action::make('add position')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([
                        TextInput::make('position_name')
                    ])->action(function($data){
                        \App\Models\EmployeePosition::create($data);
                        Notification::make()
                        ->title('Created successfully')
                        ->success()
                        ->send();
                    })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false)
            ])
            ->columns([
                TextColumn::make('position_name'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->color(Color::Green) ->form([
                    TextInput::make('position_name')
                ])->action(function($data,$record){
                   $record->update($data);
                    Notification::make()
                    ->title('Updated successfully')
                    ->success()
                    ->send();
                })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false),
                DeleteAction::make()->closeModalByClickingAway(false)
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.admin.employee.position');
    }
}
