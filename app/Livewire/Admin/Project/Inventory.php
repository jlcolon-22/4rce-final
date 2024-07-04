<?php

namespace App\Livewire\Admin\Project;

use Livewire\Component;
use Filament\Tables\Table;

use App\Models\ProjectDivision;

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
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Inventory extends Component implements HasForms, HasTable
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
            ->query(ProjectInventory::query()->where('project_id', $this->project_id )->latest())
            ->heading('Inventory')
            ->headerActions([
                Action::make('add inventory')->color(Color::Green)->icon('heroicon-o-plus')
                    ->form([
                        Grid::make([
                            'default' => 2,
                            'sm' => 2
                        ])->schema([

                            TextInput::make('item_name')->required(),
                            TextInput::make('price')->required(),
                            DatePicker::make('date_purchase')->time(false)->required(),
                            TextInput::make('unit')->required(),
                            TextInput::make('quantity')->numeric()->required(),
                            FileUpload::make('receipt')->required()->directory('public/receipt')->image(),
                        ]),


                    ])->action(function ($data) {


                       ProjectInventory::create([
                        'project_id'=>$this->project_id,
                        'item_name'=>$data['item_name'],
                        'price'=>$data['price'],
                        'date_purchase'=>$data['date_purchase'],
                        'unit'=>$data['unit'],
                        'quantity'=>$data['quantity'],
                        'receipt'=>$data['receipt'],
                       ]);
                        Notification::make()
                            ->title('Created successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::ScreenMedium)->closeModalByClickingAway(false)
            ])
            ->columns([
                TextColumn::make('item_name'),
                TextColumn::make('price')->prefix('₱'),
                TextColumn::make('date_purchase'),

                TextColumn::make('quantity'),
                TextColumn::make('unit'),
                ImageColumn::make('receipt')->url(fn($record) => '/storage/'.$record->receipt)->openUrlInNewTab(),


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

                            TextInput::make('item_name')->required(),
                            TextInput::make('price')->required(),
                            DatePicker::make('date_purchase')->time(false)->required(),
                            TextInput::make('unit')->required(),
                            TextInput::make('quantity')->numeric()->required(),
                            FileUpload::make('receipt')->required()->directory('public/receipt')->image(),
                        ]),


                    ])->action(function ($data,$record) {

                        // $data['divisions'] = json_encode($data['divisions']);
                        $record->update($data);
                        Notification::make()
                            ->title('Updated successfully')
                            ->success()
                            ->send();
                    })->modalWidth(MaxWidth::ScreenMedium)->closeModalByClickingAway(false),
                DeleteAction::make()
            ]);
    }
    public function render()
    {
        return view('livewire.admin.project.inventory');
    }
}
