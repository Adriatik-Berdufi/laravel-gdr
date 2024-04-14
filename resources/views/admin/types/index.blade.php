@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-light text-center">Tipi</h1>

        <a class="btn btn-primary mt-3 mb-4" href="{{ route('types.create') }}">Crea Nuovo Tipo</a>

        <section class="container">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr>
                            <td class="align-middle">{{ $type->id }}</td>
                            <td class="align-middle">{{ $type->name }}</td>
                            <td class="align-middle"><img src="{{ asset($type->image) }}" alt="{{ $type->name }}" style="max-height: 60px;"></td>
                            <td class="w-50 text-start">
                                @if (strlen($type->description) > 250)
                                    {{ substr($type->description, 3, 250) }}...
                                @else
                                    {{ $type->description }}
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('types.show', $type) }}" class="me-2 text-decoration-none">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('types.edit', $type) }}" class="me-2 text-decoration-none">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button type="button" class="modal-button" data-bs-toggle="modal"
                                    data-bs-target="#delete-type-{{ $type->id }}">
                                    <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100">Nessun tipo trovato</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $types->links() }}
        </section>
    </section>

    <!-- Modali per l'eliminazione dei tipi -->
    @foreach ($types as $type)
        <div class="modal fade" id="delete-type-{{ $type->id }}" tabindex="-1"
            aria-labelledby="delete-type-{{ $type->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-light" id="exampleModalLabel">Eliminare {{ $type->name }}</h5>
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
                            <button type="submit" class="btn btn-danger">Elimina</button>
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
