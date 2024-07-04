<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Filament\Tables\Table;
use App\Models\ProjectInventory as ModelProjectInventory;
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
    public function mount($id)
    {
        $this->project_id = $id;
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(ModelProjectInventory::query()->where('project_id', $this->project_id )->latest())
            ->heading('Inventory')
            ->headerActions([
                Action::make('back to projects')->color(Color::Green)->url(route('employee.home'))
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
            ]);
    }
    public function render()
    {
        return view('livewire.employee.inventory');
    }
}
