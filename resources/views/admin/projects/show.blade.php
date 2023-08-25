@extends('layouts.app')

@section('content')
    <div class="container" id="posts-container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header"> ID: {{ $project->id }} ---- {{ $project->slug }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">
                            Title: {{ $project->title }}
                        </h5>
                        <h5>Slug: {{ $project->slug }}</h5>
                        <div class="mb-3">

                            @if (str_starts_with($project->image, 'http'))
                                <img class="w-100" src="{{ $project->image }}" alt="{{ $project->title }}">
                            @else
                                <img class="w-100" src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}">
                            @endif

                        </div>
                        <p class="card-text">
                            {{ $project->description }}
                        </p>
                        <p>
                            <strong>{{ $project->date }}</strong>
                        </p>


                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-success">
                            Edit
                        </a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-warning">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
