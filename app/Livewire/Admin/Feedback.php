<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Table;
use Livewire\Attributes\Title;
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
use App\Models\Customer as ModelCustomer;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;

class Feedback extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Feedback::query()->with('customerInfo')->latest())

            ->heading('Customer Feedback')
            ->columns([
                TextColumn::make('fullname')->searchable()->state(fn($record)=>$record->customerInfo?->fullname),
                RatingStarColumn::make('rating'),
                TextColumn::make('feedback'),
            ])->paginationPageOptions([ '5', '10', '20'])
            ;
    }
    public function render()
    {
        return view('livewire.admin.feedback');
    }
}
