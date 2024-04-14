@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h1 class="text-center">Crea Nuovo Tipo</h1>

        <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Tipo</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="12" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('types.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
