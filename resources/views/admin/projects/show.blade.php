@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <header>
        <h1>{{ $project->title }}</h1>
    </header>
    <hr>

    <div class="clearfix">
        @if ($project->image)
            <img class="img-fluid float-start me-2" src="{{ $project->getImagePath() }}" alt="{{ $project->title }}"
                width="250">
        @endif
        <p>{{ $project->description }}</p>
    </div>
    <div>
        <strong>Created on:</strong> {{ $project->created_at }}
        <strong>Last edit:</strong> {{ $project->updated_at }}
        <strong>Type:</strong> {{ $project->type ? $project->type->label : 'None' }}
    </div>
    @forelse($project->technologies as $technology)
        <span class="badge rounded-pill text-bg-{{ $technology->color }}">{{ $technology->label }}</span>
    @empty -
    @endforelse

    <hr>
    <footer class="d-flex justify-content-between">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to list</a>
        <div class="d-flex justify-content-end gap-2 ">
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                <i class="fas fa-pencil me-2"></i> Edit
            </a>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="ms-2 delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger ">
                    <i class="fas fa-trash me-2"></i>Delete
                </button>
            </form>
        </div>
    </footer>
@endsection


@section('scripts')
    @vite('resources\js\delete-confirmation.js')
@endsection
