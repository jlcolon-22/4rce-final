<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\EmployeeAccount;
use App\Models\Project;
use Filament\Infolists\Components\Grid;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AdminWidget extends BaseWidget
{
    protected int | string | array $grid = [
        'sm' => 1,
        'xl' => 1,
    ];
    protected function getStats(): array
    {
        $employees = EmployeeAccount::get()->count();
        $customer = Customer::get()->count();
        $project = Project::get()->count();
        return [

            Stat::make('EMPLOYEES',  $employees)->icon('heroicon-o-users')->url(route('admin.employee.account'))
            ,
            Stat::make('CUSTOMERS',$customer)->icon('heroicon-o-users')->url(route('admin.customer'))
            ,
            Stat::make('PROJECTS', $project)->icon('heroicon-o-building-office-2')->url(route('admin.project.list'))

        ];
    }
}
