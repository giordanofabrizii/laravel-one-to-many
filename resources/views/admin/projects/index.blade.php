@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 px-4 py-2 d-flex justify-content-end">
            <a href="{{ Route('admin.projects.create') }}">
                <button class="btn btn-primary">New Project</button>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($projects as $project)
            <article class="col-4">
                <a href="{{ Route('admin.projects.show', compact('project')) }}">
                    <img src="{{ $project->image }}" alt="{{ $project->title }} image">
                    <h1>{{ $project->title }}</h1>
                </a>
            </article>
        @endforeach
    </div>
</div>
@endsection
