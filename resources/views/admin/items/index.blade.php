@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-light">Items</h1>
        <a class="btn btn-primary mt-3 mb-4" href="{{ route('items.create') }}">Crea Nuovo Item</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Damege</th>
                    <th scope="col">action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td class="w-25">{{ $item->description }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->weight }}</td>
                        <td>{{ $item->getCost() }}</td>
                        <td>{{ $item->damege }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('items.show', $item) }}" class="me-2 text-decoration-none">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('items.edit', $item) }}" class="me-2 text-decoration-none">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button type="button" class="modal-button" data-bs-toggle="modal"
                                data-bs-target="#delete-item-{{ $item->id }}">
                                <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%">Nessun risultato trovato</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        {{ $items->links() }}
    </section>
    
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
