@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
        <h1 class="text-light text-center">Personaggi creati</h1>

        <a href="{{ route('characters.create') }}">Crea</a>
        
        @forelse ($characters as $character)
          <h2>{{$character->name}}</h2>
          <a href="{{route('characters.edit', $character)}}">Modifica</a>  
        @empty
            
        @endforelse
   

    </section>

@endsection
