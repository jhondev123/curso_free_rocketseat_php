<?php

namespace App\Livewire\Projects;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.projects.index');
    }

    #[Computed]
    public function projects()
    {

        return \App\Models\Project::query()->inRandomOrder()->get();
    }
}
