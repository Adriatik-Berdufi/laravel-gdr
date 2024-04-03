@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <h1 class="text-light text-center">{{ $character->name }}</h1>

        <a class="btn btn-primary mt-3 mb-4" href="{{ route('characters.index') }}">Torna alla lista</a>
        <a class="btn btn-primary mt-3 mb-4" href="{{ route('characters.edit', $character) }}">Modifica</a>
        <button type="button" class="btn btn-danger mt-3 mb-4" data-bs-toggle="modal"
            data-bs-target="#delete-character-{{ $character->id }}">
            Elimina Pg
        </button>


        @if (!is_null($character->description))
            <div class="mb-2"><b class="fs-5">Descrizione:</b> {{ $character->description }}</div>
        @endif

        <div class="mb-2"><b class="fs-5">Attacco:</b> {{ $character->attack }}</div>
        <div class="mb-2"><b class="fs-5">Difesa:</b> {{ $character->defense }}</div>
        <div class="mb-2"><b class="fs-5">Velocità:</b> {{ $character->speed }}</div>
        <div class="mb-2"><b class="fs-5">Vita:</b> {{ $character->life }}</div>

    </section>
@endsection

@section('modal')
    <div class="modal fade" id="delete-character-{{ $character->id }}" tabindex="-1"
        aria-labelledby="delete-character-{{ $character->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Eliminare {{ $character->name }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Premendo elimina l'azione sarà irreversibile. Procedere?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <form action="{{ route('characters.destroy', $character) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
