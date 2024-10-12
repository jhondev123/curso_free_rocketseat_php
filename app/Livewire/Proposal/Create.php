<?php

namespace App\Livewire\Proposal;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public bool $modal = false;

    public Project $project;

    public string $email = '';
    public int $hours =0;
    public bool $agree = false;
    public function save()
    {

        $this->validate([
            'email' => 'required|email',
            'hours' => 'required|integer|min:1'
        ]);

        if(!$this->agree){
            $this->addError('agree', 'Precisa concordar com os termos de uso');
            return;
        }

        $this->project->proposals()->create([
            'email' => $this->email,
            'hours' => $this->hours
        ]);

        $this->modal = false;
        $this->email = '';
        $this->hours = 0;
    }
    public function render()
    {
        return view('livewire.proposal.create');
    }
}
