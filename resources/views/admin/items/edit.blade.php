@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-light text-center">Modifica Item</h1>

        <a class="btn btn-primary mt-3 mb-4" href="{{ route('items.index') }}">Torna alla lista</a>

        <form action="{{ route('items.update', $item) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row g-3">
                <div class="col-3">
                    <label for="name" class="form-label">Nome</label>
                    <input value="{{ $item->name }}" type="text" class="form-control" id="name" name="name"
                        required>
                </div>
                <div class="col-3">
                    <label for="type" class="form-label">Tipo</label>
                    <input value="{{ $item->type }}" type="text" class="form-control" id="type"
                        name="type" required>
                </div>
               <div class="row g-3">
                    <div class="col-2">
                        <label for="weight" class="form-label">Peso</label>
                        <input value="{{ $item->weight }}" type="text" class="form-control" id="weight"
                            name="weight" required>
                    </div>
                    <div class="col-2">
                        <label for="cost" class="form-label">Costo in {{$item->cost_unit}}</label>
                        <input value="{{ $item->cost }}" type="number" class="form-control" id="cost"
                            name="cost" required>
                    </div>
                    
               </div>
               <div class="row g-3">
                    <div class="col-2">
                        <label for="damege" class="form-label">Damege {{$item->cost_unit}}</label>
                        <input value="{{ $item->damege }}" type="text" class="form-control" id="damege"
                            name="damege" required>
                    </div>
               </div>
                
                <div class="col-12">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ $item->description }}</textarea>
                </div>
            </div>

            <button class="btn btn-primary mt-4">
                Modifica
            </button>
        </form>


    </section>
@endsection
