<?php

namespace App\Livewire\Admin\Project;

use Livewire\Component;
use Filament\Tables\Table;
use App\Models\ProjectDivision;

use App\Enums\ProjectStatusEnum;
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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ProjectList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function mount()
    {
    }
    // public function allDivision()
    // {
    //     $d =  collect(ProjectDivision::get())->map(function ($division) {
    //         return Toggle::make($division->id)->label($division->division_name)->default(true);
    //     })->all();
    //     return $d;
    // }
    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Project::query()->with('team')->latest())
            ->heading('Projects')
            ->headerActions([
                Action::make('add project')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            Select::make('proposed_project')->options([
                                'Building' => 'Building',
                                'House' => 'House',
                                'Renovate' => 'Renovate',
                            ]),
                            TextInput::make('project_name'),
                        ]),
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            DatePicker::make('start_date'),
                            DatePicker::make('deadline'),
                        ]),
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            Select::make('assign_team')->options(\App\Models\ProjectTeam::get()->pluck('team_name', 'id')),
                            Select::make('customer')->options(\App\Models\Customer::get()->pluck('fullname', 'id'))
                        ]),
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            TextInput::make('cost')->numeric()->prefix('₱'),
                            Select::make('status')->options(collect(\App\Enums\ProjectStatusEnum::cases())->mapWithKeys(function (\App\Enums\ProjectStatusEnum $status) {
                                return [$status->value => $status->name];
                            })->all())->default(\App\Enums\ProjectStatusEnum::ONGOING),
                        ]),
                        Textarea::make('project_location'),


                        RichEditor::make('description')->toolbarButtons([
                            'blockquote',
                            'bold',
                            'bulletList',

                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])


                    ])->action(function ($data) {


                        // $newData = array_filter($data, function ($key) {
                        //     return $key !== 'divisions';
                        // }, ARRAY_FILTER_USE_KEY);

                        $project = \App\Models\Project::create($data);
                        // foreach($data['divisions'] as $key => $value)
                        // {
                        //     if($value)
                        //     {
                        //         \App\Models\Division::create([
                        //             'division_id'=>$value,
                        //             'project_id'=> $project->id
                        //         ]);
                        //     }
                        // }
                        Notification::make()
                            ->title('Created successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::ScreenMedium)->closeModalByClickingAway(false)
            ])
            ->columns([
                TextColumn::make('project_name'),
                TextColumn::make('inventory')->url(fn ($record) => route('admin.project.inventory', ['project_id' => $record->id]))->label('inventory')->state(fn () => 'Inventory')->color(Color::Blue),
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
                })
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->color(Color::Green)
                    ->beforeFormFilled(function ($record) {

                        $record['divisions'] = json_decode($record->divisions);
                        return $record;
                    })

                    ->form([
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            Select::make('proposed_project')->options([
                                'Building' => 'Building',
                                'House' => 'House',
                                'Renovate' => 'Renovate',
                            ]),
                            TextInput::make('project_name'),
                        ]),
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            DatePicker::make('start_date'),
                            DatePicker::make('deadline'),
                        ]),
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            Select::make('assign_team')->options(\App\Models\ProjectTeam::get()->pluck('team_name', 'id')),
                            Select::make('customer')->options(\App\Models\Customer::get()->pluck('fullname', 'id'))
                        ]),
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([
                            TextInput::make('cost')->numeric()->prefix('₱'),
                            Select::make('status')->options(collect(\App\Enums\ProjectStatusEnum::cases())->mapWithKeys(function (\App\Enums\ProjectStatusEnum $status) {
                                return [$status->value => $status->name];
                            })->all())->default(\App\Enums\ProjectStatusEnum::ONGOING),
                        ]),
                        Textarea::make('project_location'),
                        // Fieldset::make('Divisions')
                        //     ->schema([
                        //         Grid::make([
                        //             'default' => 3,
                        //             'sm' => 3
                        //         ])->schema($this->allDivision()),
                        //     ])->statePath('divisions'),

                        RichEditor::make('description')->toolbarButtons([
                            'blockquote',
                            'bold',
                            'bulletList',

                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])



                    ])->action(function ($data,$record) {


                       $record->update($data);
                        Notification::make()
                            ->title('Updated successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::ScreenMedium)->closeModalByClickingAway(false),
                Action::make('progress')->color(Color::Blue)->icon('heroicon-o-square-3-stack-3d')->url(fn ($record) => route('admin.project.progress', ['project_id' => $record->id]))
            ]);
    }
    public function render()
    {
        return view('livewire.admin.project.project-list');
    }
}
