<?php

namespace App\Livewire\Client;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Enums\ProjectStatusEnum;

class Projects extends Component
{

    #[Title('Projects')]
    public function render()
    {
        $projects = Project::where('status',ProjectStatusEnum::FINISHED->value)->get();
        return view('livewire.client.projects',compact('projects'));
    }
}
