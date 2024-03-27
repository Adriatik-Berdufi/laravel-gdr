@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
        <h1 class="text-light text-center">{{$character->name}}</h1>

        <a href="{{ route('characters.edit', $character) }}">Modifica</a>
        <ul>
            @if (!is_null($character->description))
            <li>Descrizione: {{$character->description}}</li>    
            @endif
          
           <li>Attacco: {{$character->attack}}</li>
           <li>Difesa: {{$character->defense}}</li>
           <li>Velocità: {{$character->speed}}</li>
           <li>Vita: {{$character->life}}</li> 
        </ul>
   

    </section>

@endsection