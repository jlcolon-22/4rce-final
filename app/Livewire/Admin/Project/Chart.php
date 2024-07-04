<?php

namespace App\Livewire\Admin\Project;

use Illuminate\Support\Str;
use Filament\Widgets\ChartWidget;
use Filament\Support\Colors\Color;

class Chart extends ChartWidget
{
    protected static ?string $heading = '-- Project Progress --';


    public $data;
    protected static ?array $options = [
        'plugins' => [
            'legend' => [
                'display' => false,
            ],
        ],
        'scales' => [
            'y' => [
                'display' => false, // hide the y axis
            ],
        ],
    ];
    protected function getData(): array
    {
        $allData = [];
        $labels = [];
        $i = 0;
        $colors = [];
        $total = 0;
        foreach($this->data as $value)
        {
            $allData[] = $value->percent;
            $total += (int)$value->percent;
            $labels[] = $value->divisionInfo?->division_name." ($value->percent%)";
            $colors[] = '#' . Str::random(6, '0123456789ABCDEF'); // generate random hex color code
            $i++;
        }
        $x = $total/$i;
        $allData[] =(int)$x;
        $labels[] = 'Total';
        $colors[] = '#' . Str::random(6, '0123456789ABCDEF'); // generate random hex color code
        return [
            'datasets' => [
                [

                    'data' =>  $allData,
                    'backgroundColor' => ['#FFCC66','#FF0033','#33FF66','#33FFCC','#33CC66','#663399','#FF9966'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
