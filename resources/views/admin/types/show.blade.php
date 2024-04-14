@extends('layouts.app')

@section('content')
    <section class="container py-3">
        <h1 class="text-light text-center mb-5">{{ $type->name }}</h1>

        <a class="btn btn-primary mt-3 mb-4" href="{{ route('types.index') }}">Torna alla lista</a>

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <img src='{{ asset($type->image) }}' class="card-img-top card-image-character"
                            alt="{{ $type->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $type->name }}</h5>
                    </div>
                    <div class="card-head">
                        <div class="card-body">
                            <a class="btn btn-primary me-2" href="{{ route('types.edit', $type) }}">Modifica</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-type-{{ $type->id }}">
                                Elimina
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="mb-3"><b class="fs-5">Abilità di classe:</b></div>
                <div class="description-scroll" style="max-height: 380px; overflow-y: auto;">
                    @foreach ($type->getSeparatedText() as $text)
                        <div class="mb-3">{{ $text }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade" id="delete-type-{{ $type->id }}" tabindex="-1"
        aria-labelledby="delete-type-{{ $type->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Eliminare {{ $type->name }}
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Premendo elimina l'azione sarà irreversibile. Procedere?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <form action="{{ route('types.destroy', $type) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" value="Elimina">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
