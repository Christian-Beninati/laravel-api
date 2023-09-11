@extends('layouts.app')

@section('title', 'Create Projects')

@section('content')
    <header class="d-flex align-items-center justify-content-between">
        <h1>Create Project</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn bn-sm btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Go back
        </a>
    </header>
    <hr>
    {{-- Form --}}
    @include('includes.projects.form')
@endsection

@section('scripts')
    {{-- @vite('resources/js/image-preview') --}}
@endsection
