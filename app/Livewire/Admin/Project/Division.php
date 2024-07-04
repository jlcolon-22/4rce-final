<?php

namespace App\Livewire\Admin\Project;

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

class Division extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query( \App\Models\ProjectDivision::query()->latest())
            ->heading('Division')
            ->headerActions([
                Action::make('add division')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([
                        TextInput::make('division_name')
                    ])->action(function($data){
                        \App\Models\ProjectDivision::create($data);
                        Notification::make()
                        ->title('Created successfully')
                        ->success()
                        ->send();
                    })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false)
            ])
            ->columns([
                TextColumn::make('division_name'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->color(Color::Green) ->form([
                    TextInput::make('division_name')
                ])->action(function($data,$record){
                   $record->update($data);
                    Notification::make()
                    ->title('Updated successfully')
                    ->success()
                    ->send();
                })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false),
                DeleteAction::make()->closeModalByClickingAway(false)
            ])
            ;
    }
    public function render()
    {
        return view('livewire.admin.project.division');
    }
}
