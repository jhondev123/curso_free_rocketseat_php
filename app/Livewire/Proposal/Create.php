<?php

namespace App\Livewire\Proposal;

use App\Actions\ArrangePositions;
use App\Livewire\Projects\Proposals;
use App\Models\Project;
use App\Models\Proposal;
use App\Notifications\NewProposal;
use App\Notifications\PerdeuMane;
use Illuminate\Support\Facades\DB;
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

        DB::transaction(function(){
            $proposal = $this->project->proposals()->updateOrCreate(
                ['email' => $this->email],
                ['hours' => $this->hours]
            );

            $this->dispatch('proposal::created');

            $this->arrangePositions($proposal);

            $this->modal = false;
            $this->email = '';
            $this->hours = 0;
        });
        $this->project->author->notify(new NewProposal($this->project));

    }

    public function arrangePositions(Proposal $proposal)
    {
        $query = DB::select('
            select *, row_number() over (order by hours asc) as newPosition
            from proposals
            where project_id = :project
            ', ['project' => $proposal->project_id]);
        $position = collect($query)->where('id', '=', $proposal->id)->first();
        $otherProposal = collect($query)->where('position', '=', $position->newposition)->first();
        if ($otherProposal) {
            $proposal->update(['position_status' => 'up']);
            $oProposal = Proposal::find($otherProposal->id);

            $oProposal->update(['position_status' => 'down']);
            $oProposal->notify(new PerdeuMane($this->project));
        }
        ArrangePositions::run($proposal->project_id);
    }

    public function render()
    {
        return view('livewire.proposal.create');
    }
}
