@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-light text-center">{{ $title }}</h1>
        <div>
            <img src="{{ asset('images/home-img.jpg') }}" alt="home-img" width="100%">
        </div>
    </section>
@endsection
