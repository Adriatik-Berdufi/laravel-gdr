@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-light">Items</h1>

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
