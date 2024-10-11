<div>
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    <p>{{ $project->created_at }}</p>
    <p>{{ $project->updated_at }}</p>



    <a href="{{ route('projects.index') }}">Voltar</a>

</div>
