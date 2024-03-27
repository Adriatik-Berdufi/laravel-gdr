@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <section class="container mt-5">
            <h1 class="text-light text-center">Personaggi creati</h1>

            @forelse ($characters as $character)
                <h2>{{ $character->name }}</h2>


                <section class="container mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Attaco</th>
                                <th scope="col">Difessa</th>
                                <th scope="col">Vita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $character->id }}</td>
                                <td>{{ $character->name }}</td>
                                <td>${{ $character->attack }}</td>
                                <td>{{ $character->defense }}</td>
                                <td>{{ $character->life }}</td>
                                <td><a href="{{ route('characters.edit', $character) }}">Modifica</a> <a
                                        href="{{ route('characters.show', $character) }}">Vai al PG</a></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            @empty
            @endforelse


            {{ $characters->links() }}
        </section>
    </section>
@endsection
