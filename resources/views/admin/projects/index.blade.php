@extends('layouts.app')

@section('title', 'Progetti')

@section('main-content')
    <div class="container">
        <h1 class="fs-4 text-secondary my-4 text-center">Progetti</h1>
        <div class="row justify-content-center">
            @foreach ($projects as $project)
                <div class="card col-5 m-3">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                        <div class="d-flex">
                            <a href="{{ $project->url }}" class="btn btn-dark"><i class="fa-brands fa-github"></i></a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning mx-3"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary mx-3"><i
                                    class="fa-solid fa-eye"></i></a>

                            {{-- Delete Button --}}
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-black"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
