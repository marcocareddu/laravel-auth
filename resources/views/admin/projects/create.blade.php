@extends('layouts.app')

@section('title', 'Aggiungi')

@section('main-content')
    <div class="container text-center">


        <form method="POST" action="{{ route('admin.projects.store') }}">

            {{-- Token --}}
            @csrf

            <div class="row justify-content-center">
                <h1 class="my-3">Aggiungi Progetto</h1>

                {{-- Name --}}
                <div class="mb-3 col-12 text-start">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name"
                        class="form-control @error('name') is-invalid @elseif (old('name')) is-valid @enderror"
                        value="{{ old('name') }}" autofocus required>
                </div>

                {{-- Description --}}
                <div class="mb-3 col-12 text-start">
                    <label class="form-label" for="description">Descrizione</label>
                    <textarea type="text" id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                {{-- Thumb --}}
                <div class="col-10 text-start">
                    <div class="mb-3">
                        <label class="form-label" for="thumb">Immagine</label>
                        <input type="url" id="thumb" name="thumb"
                            class="form-control @error('thumb') is-invalid @elseif (old('thumb')) is-valid @enderror"
                            value="{{ old('thumb') }}" required>
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <img src="{{ old('name', 'https://t3.ftcdn.net/jpg/03/45/05/92/360_F_345059232_CPieT8RIWOUk4JqBkkWkIETYAkmz2b75.jpg') }}"
                            alt="" id="thumbnail-preview" class="img-fluid">
                    </div>
                </div>

                {{-- Link github --}}
                <div class="mb-3 col-12 text-start">
                    <label class="form-label" for="url">Github</label>
                    <input type="url" id="url" name="url"
                        class="form-control @error('url') is-invalid @elseif (old('url')) is-valid @enderror"
                        value="{{ old('url') }}" required>
                </div>

            </div>
            <button class="btn btn-success">Aggiungi</button>
        </form>

    </div>
@endsection

@section('scripts')
    @vite('resources/js/preview.js')
@endsection
