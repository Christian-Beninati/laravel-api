@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header class="d-flex align-items-center justify-content-between">
        <h1>Projects</h1>
        <a href=" {{ route('admin.projects.create') }}" class="btn btn-success">New post</a>
    </header>
    <hr>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Technologies</th>
                <th scope="col">Link</th>
                <th scope="col">Created on</th>
                <th scope="col">Last edit</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row" class="align-middle">{{ $project->id }}</th>
                    <td class="align-middle">{{ $project->title }}</td>
                    <td class="align-middle">{{ $project->type?->label }}</td>
                    <td>
                        @forelse($project->technologies as $technology)
                            <span
                                class="badge rounded-pill text-bg-{{ $technology->color }} me-2">{{ $technology->label }}</span>
                        @empty -
                        @endforelse
                    </td>
                    <td class="align-middle">{{ $project->url }}</td>
                    <td class="align-middle">{{ $project->created_at }}</td>
                    <td class="align-middle">{{ $project->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-2 ">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="ms-2 delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">
                        <h3>There are no projects</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    @vite('resources\js\delete-confirmation.js')
@endsection
