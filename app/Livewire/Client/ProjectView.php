<?php

namespace App\Livewire\Client;

use App\Models\Project;
use Livewire\Component;

class ProjectView extends Component
{
    public $project = [];
    public function mount($id)
    {
       $this->project = Project::where('id',$id)->first();
    }
    public function render()
    {

        return view('livewire.client.project-view');
    }
}
