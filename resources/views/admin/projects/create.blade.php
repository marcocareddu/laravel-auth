@extends('layouts.app')

@section('title', 'Aggiungi')

@section('main-content')
    <div class="container text-center">


        <form method="POST" action="{{ route('admin.projects.store') }}">

            {{-- Token --}}
            @csrf

            <div class="row justify-content-center">
                <h1 class="mb-3">ADD project</h1>

                {{-- Name --}}
                <div class="mb-3 col-6">
                    <label class="text-start" for="name">Nome</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        autofocus>
                </div>

                {{-- Thumb --}}
                <div class="mb-3 col-6">
                    <label class="form-label" for="thumb">Immagine</label>
                    <input type="text" id="thumb" name="thumb" class="form-control" value="{{ old('thumb') }}">
                </div>

                {{-- Thumb --}}
                <div class="mb-3 col-6">
                    <label class="form-label" for="url">Github</label>
                    <input type="text" id="url" name="url" class="form-control" value="{{ old('url') }}">
                </div>

                {{-- Description --}}
                <div class="mb-3 col-6">
                    <label class="form-label" for="description">Descrizione</label>
                    <textarea type="text" id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
            </div>
            <button class="btn btn-success">Aggiungi</button>
        </form>

    </div>
@endsection
