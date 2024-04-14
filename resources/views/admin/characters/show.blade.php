@extends('layouts.app')

@section('content')
    <section class="container py-3">
        <h1 class="text-light text-center">{{ $character->name }}</h1>

        <a class="btn btn-primary mt-3 mb-4" href="{{ route('characters.index') }}">Torna alla lista</a>

        {{-- @dd($character->type) --}}

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <img src='{{ asset($character->type->image) }}' class="card-img-top card-image-character"
                            alt="{{ $character->type->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $character->name }} - {{ $character->type->name }}</h5>
                        @if (!is_null($character->description))
                        @endif
                        <p class="card-text">{{ $character->description }}</p>
                    </div>
                    <div class="card-body p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Attaco</th>
                                    <th scope="col">Difesa</th>
                                    <th scope="col">Velocità</th>
                                    <th scope="col">Intelligenza</th>
                                    <th scope="col">Vita</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $character->strength }}</td>
                                    <td>{{ $character->defence }}</td>
                                    <td>{{ $character->speed }}</td>
                                    <td>{{ $character->intelligence }}</td>
                                    <td>{{ $character->life }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="character-item-list py-2">
                        @foreach ($character->items as $item)
                            <div class="d-flex justify-content-between px-4 py-2 border">
                                <span class="d-inline-block">{{ $item->name }}</span>
                                <a href="{{ route('items.show', $item) }}">Vai all'oggetto</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary me-2" href="{{ route('characters.edit', $character) }}">Modifica</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-character-{{ $character->id }}">
                            Elimina Pg
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="mb-2"><b class="fs-5">Abilità di classe:</b></div>
                <div class="character-class-description">
                    @foreach ($character->type->getSeparatedText() as $text)
                        <div class="mb-3">{{ $text }}</div>
                    @endforeach
                </div>
            </div>



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
