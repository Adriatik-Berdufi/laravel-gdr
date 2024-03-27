@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
        <h1 class="text-light text-center">Modifica Personaggio</h1>
        <form action="{{ route('characters.update', $character) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="col-6">
                    <label for="name" class="form-label">Nome</label>
                    <input value="{{$character->name}}" type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-6">
                    <label for="attack" class="form-label">Attacco</label>
                    <input  value="{{$character->attack}}" type="number" class="form-control" id="attack" name="attack" required>
                </div>
                <div class="col-6">
                    <label for="defense" class="form-label">Difesa</label>
                    <input  value="{{$character->defense}}" type="number" class="form-control" id="defense" name="defense" required>
                </div>
                <div class="col-6">
                    <label for="speed" class="form-label">Velocità</label>
                    <input  value="{{$character->speed}}" type="number" class="form-control" id="speed" name="speed" required>
                </div>
                <div class="col-6">
                    <label for="life" class="form-label">Vita</label>
                    <input  value="{{$character->life}}" type="number" class="form-control" id="life" name="life" required>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$character->description}}</textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-3">
                Modifica
            </button>
        </form>


    </section>

@endsection
