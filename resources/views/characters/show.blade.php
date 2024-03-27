@extends('layouts.app')

@section('main-content')
<section class="container mt-5">
        <h1 class="text-light text-center">{{$character->name}}</h1>

        <a href="{{ route('characters.create') }}">Crea</a>
   

    </section>

@endsection