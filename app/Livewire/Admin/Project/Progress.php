<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Filament\Tables\Table;

use App\Models\ProjectProgress;
use App\Models\ProjectInventory;
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
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Actions\Concerns\InteractsWithActions;

class Progress extends Component implements HasForms, HasTable,HasActions
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithActions;
    public $project_id;
    public function mount($project_id)
    {
        $this->project_id = $project_id;
    }
    public function modalFormAction()
    {
        return   \Filament\Actions\Action::make('modalForm')
            ->label('Change Picture ')
            ->link()

            ->modalHeading('Change Picture')
            ->form([
                FileUpload::make('final_image')->required()->image()

            ])

            ->action(function ( $data) {

                \App\Models\Project::where('id',$this->project_id)->update($data);
                Notification::make()
                    ->title('Updated successfully')
                    ->success()
                    ->send();
            });
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(ProjectProgress::query()->where('project_id', $this->project_id)->latest())
            ->headerActions([
                Action::make('add progress')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([

                        FileUpload::make('picture')->required()->directory('public/project/progress')->image(),
                        TextInput::make('percent')->numeric()->required()->minValue(0)->maxValue(100),

                    ])->action(function ($data) {


                        ProjectProgress::create([
                            'project_id' => $this->project_id,
                            'picture' => $data['picture'],
                            'percent' => $data['percent'],

                        ]);
                        Notification::make()
                            ->title('Created successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::ScreenMedium)->closeModalByClickingAway(false)
            ])
            ->columns([
                ImageColumn::make('picture')
                    ->circular()->defaultImageUrl(asset('images/preview.png'))->url(fn ($record) => '/storage/' . $record->picture)->openUrlInNewTab(),

                TextColumn::make('percent')->state(fn ($record) => $record->percent . '%'),
                TextColumn::make('created_at'),

            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->color(Color::Green)
                    ->beforeFormFilled(function ($record) {

                        $record['division'] = $record->divisionInfo?->division_name;
                        return $record;
                    })

                    ->form([

                        FileUpload::make('picture')->required()->directory('public/project/progress')->image(),
                        TextInput::make('percent')->numeric()->required()->minValue(0)->maxValue(100),

                    ])->action(function ($data, $record) {


                        $record->update($data);
                        Notification::make()
                            ->title('Updated successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::Small)->closeModalByClickingAway(false),
                DeleteAction::make()
            ]);
    }
    public function render()
    {
        $projectInfo = Project::with(['customerInfo'])->where('id', $this->project_id)->first();
        return view('livewire.admin.project.progress', compact('projectInfo'));
    }
}
