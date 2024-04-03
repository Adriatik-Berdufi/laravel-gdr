@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <section class="container mt-5">
            <h1 class="text-light text-center">Personaggi creati</h1>

            <a class="btn btn-primary mt-3 mb-4" href="{{ route('characters.create') }}">Crea Nuovo Pg</a>


            <section class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Attaco</th>
                            <th scope="col">Difesa</th>
                            <th scope="col">Velocità</th>
                            <th scope="col">Vita</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($characters as $character)
                            <tr>
                                <td>{{ $character->id }}</td>
                                <td>{{ $character->name }}</td>
                                <td>{{ $character->attack }}</td>
                                <td>{{ $character->defense }}</td>
                                <td>{{ $character->speed }}</td>
                                <td>{{ $character->life }}</td>
                                <td>
                                    <a href="{{ route('characters.show', $character) }}" class="me-2">
                                        <i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('characters.edit', $character) }}" class="me-2">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" class="modal-button" data-bs-toggle="modal"
                                        data-bs-target="#delete-character-{{ $character->id }}">
                                        <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">Nessun personaggio trovato</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $characters->links() }}
            </section>
        </section>
    </section>
@endsection

@section('modal')
    @foreach ($characters as $character)
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
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
