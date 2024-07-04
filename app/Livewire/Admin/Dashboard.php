<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Table;
use Livewire\Attributes\Title;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Dashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Customer::query()->latest()->limit(10))
            ->heading('Latest Customer')
            ->columns([
                TextColumn::make('fullname'),
                TextColumn::make('email'),
            ])->paginated(false);
    }
    #[Title('Dashboard - Admin')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
