<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Test extends Component
{
    public string $search = "";
    public function render()
    {
        return view(
            'livewire.test',
            [
                "users" => User::query()
                ->when($this->search, function ($query) {
                    return $query->where('name', 'like', "%{$this->search}%");
                })->get()
            ]

        );
    }
}
