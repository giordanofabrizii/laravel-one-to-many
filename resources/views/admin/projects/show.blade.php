@extends('layouts.admin')

@section('custom-js')
    @vite('resources/js/delete.js')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <article class="col-12">
                @dd($project)
                <img src="{{$project->image}}" alt="">
                <h1>{{ $project->title }} </h1>
                <h3>{{ $project->type->name }}</h3>
                <a class="btn btn-warning" href="{{route('admin.projects.edit',compact('project'))}}">
                    Edit
                </a>
                <form id="delete-form" class="d-inline" action="{{route('admin.projects.destroy',$project)}}" method="POST" project_title="{{$project->title}}">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </article>
        </div>
    </div>

@endsection
