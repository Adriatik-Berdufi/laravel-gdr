@extends('layouts.app')

@section('content')
    <section class="container py-3">
        <h1 class="text-light text-center">Modifica tipo</h1>

        <form action="{{ route('types.update', $type) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label text-light">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label text-light">Immagine</label>
                <input type="file" class="form-control" id="image" name="image">
                <div class="mb-3">
                    <label for="current_image" class="form-label text-light"></label>
                    <div>
                        <img src="{{ asset($type->image) }}" alt="Immagine attuale" style="max-width: 70px;">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label text-light">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="15">{{ $type->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salva modifiche</button>
        </form>
    </section>
@endsection
