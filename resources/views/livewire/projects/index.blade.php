<div>
    @foreach($this->projects as $project)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name }}</h5>
                <p class="card-text">{{ $project->description }}</p>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">Ver</a>
            </div>
        </div>

    @endforeach
</div>
