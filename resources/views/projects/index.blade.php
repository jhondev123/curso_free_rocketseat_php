<x-layouts.app>
<div>
    <ul>
        @foreach($projects as $project)
            <li> {{ $project }}</li>
        @endforeach
    </ul>
</div>
</x-layouts.app>
