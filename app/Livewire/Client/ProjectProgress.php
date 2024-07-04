<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Project;

use Filament\Tables\Table;

use App\Models\ProjectInventory;
use App\Models\ProjectProgress as ModelProjectProgress;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Support\Enums\MaxWidth;

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
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ProjectProgress extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;
    public $project_id;
    public function mount($project_id)
    {
        $this->project_id = $project_id;
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(ModelProjectProgress::query()->where('project_id', $this->project_id)->latest())
            ->heading('Project Progress')
            ->headerActions([
                Action::make('back to projects')->color(Color::Green)->url(route('client.myprojects'))
            ])
            ->columns([
                ImageColumn::make('picture')
                    ->circular()->defaultImageUrl(asset('images/preview.png'))->url(fn($record) => '/storage/'.$record->picture)->openUrlInNewTab(),

                TextColumn::make('percent')->state(fn ($record) => $record->percent.'%'),
                TextColumn::make('created_at'),

            ])
            ->filters([
                // ...
            ])
           ;
    }

    public function render()
    {
        $projectInfo = Project::with(['customerInfo'])->where('id', $this->project_id)->first();
        return view('livewire.client.project-progress',compact('projectInfo'));
    }
}
