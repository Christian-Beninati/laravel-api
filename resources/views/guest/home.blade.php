@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <h1>My projects</h1>
    </div>

    @forelse ($projects as $project)
        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->created_at }}</h6>
                <div class="clearfix">
                    <img class="float-start me-2" src="{{ $project->image }}" alt="{{ $project->title }}">
                    <p class="card-text">{{ $project->description }}</p>
                </div>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    @empty
        <h3 class="text-center">There are no projects</h3>
    @endforelse
@endsection
