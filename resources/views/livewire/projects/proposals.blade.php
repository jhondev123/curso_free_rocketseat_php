<div>
        <h2>Propostas</h2>
        <ul>
            @foreach($project->proposals as $proposal)
                <li>
                    <p>{{ $proposal->description }}</p>
                    <p>{{ $proposal->created_at }}</p>
                    <p>{{ $proposal->updated_at }}</p>
                </li>
            @endforeach
        </ul>
</div>
