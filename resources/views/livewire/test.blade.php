<div>
    <input wire:model.live="search" />
<ul>
    @foreach($users as $user)
        <l1>{{ $user->name }}</l1>

    @endforeach
</ul>
</div>
