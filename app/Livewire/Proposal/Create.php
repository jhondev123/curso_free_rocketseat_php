<?php

namespace App\Livewire\Proposal;

use Livewire\Component;

class Create extends Component
{
    public bool $modal = false;
    public function render()
    {
        return view('livewire.proposal.create');
    }
}
