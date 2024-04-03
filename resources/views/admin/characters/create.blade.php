@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-light text-center">Creazione Personaggi</h1>

        <a class="btn btn-primary mt-3 mb-4" href="{{ route('characters.index') }}">Torna alla lista</a>

        <form action="{{ route('characters.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-6">
                    <label for="attack" class="form-label">Attacco</label>
                    <input type="number" class="form-control" id="attack" name="attack" required>
                </div>
                <div class="col-6">
                    <label for="defense" class="form-label">Difesa</label>
                    <input type="number" class="form-control" id="defense" name="defense" required>
                </div>
                <div class="col-6">
                    <label for="speed" class="form-label">Velocità</label>
                    <input type="number" class="form-control" id="speed" name="speed" required>
                </div>
                <div class="col-6">
                    <label for="life" class="form-label">Vita</label>
                    <input type="number" class="form-control" id="life" name="life" required>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-3">
                Save
            </button>
        </form>


    </section>
@endsection
