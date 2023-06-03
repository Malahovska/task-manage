@section('content')
    <h2>Edit Project</h2>

    @if ($error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    <form action="{{ route('project.update', ['id' => $project->id]) }}" method="post">
        <!-- Rest of the form -->
    </form>


@endsection
