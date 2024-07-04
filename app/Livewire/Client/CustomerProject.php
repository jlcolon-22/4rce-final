<?php

namespace App\Livewire\Client;

use App\Enums\ProjectStatusEnum;
use Livewire\Component;

use Filament\Tables\Table;

use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class CustomerProject extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Project::query()->with('team')->where('customer',Auth::guard('customer')->id())->latest())
            ->heading('Projects')

            ->columns([
                TextColumn::make('project_name'),
                TextColumn::make('inventory')->url(fn ($record) => route('client.myprojects.project.inventory', ['id' => $record->id]))->label('inventory')->state(fn () => 'Inventory')->color(Color::Blue),
                TextColumn::make('assign_team')->state(fn ($record) => $record->team?->team_name),
                TextColumn::make('start_date'),
                TextColumn::make('deadline'),

                TextColumn::make('status')->badge()->color(function($record)
            {
                if($record->status == ProjectStatusEnum::CANCELED->value)
                {
                    return Color::Red;
                }elseif($record->status == ProjectStatusEnum::ONGOING->value)
                {
                    return Color::Yellow;
                }elseif($record->status == ProjectStatusEnum::FINISHED->value)
                {
                    return Color::Green;
                }
            }),
            ])
            ->filters([
                // ...
            ])
            ->actions([

                Action::make('progress')->color(Color::Blue)->icon('heroicon-o-square-3-stack-3d')->url(fn ($record) => route('client.myprojects.project.progress', ['project_id' => $record->id]))
            ]);
    }
    public function render()
    {
        return view('livewire.client.customer-project');
    }
}
