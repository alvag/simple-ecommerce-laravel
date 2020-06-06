@extends('layouts.app')
@section('content')
    <h1>Crear un producto</h1>

    <form method="POST" action="{{route('products.store')}}">
        @csrf
        <div class="form-row">
            <label for="title">Título</label>
            <input type="text" value="{{old('title')}}" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-row">
            <label for="description">Descripción</label>
            <input type="text" value="{{old('description')}}" name="description" id="description" class="form-control"
                   required>
        </div>

        <div class="form-row">
            <label for="price">Precio</label>
            <input type="text" value="{{old('price')}}" name="price" id="price" min="1.00" step="0.01"
                   class="form-control" required>
        </div>

        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="text" value="{{old('stock')}}" name="stock" id="stock" min="0" class="form-control" required>
        </div>

        <div class="form-row">
            <label for="status">Estado</label>
            <select class="custom-select" name="status" id="status" required>
                <option value="" selected>Seleccionar</option>
                <option {{old('status') == 'available' ? 'selected' : ''}} value="available">Disponible</option>
                <option {{old('status') == 'unavailable' ? 'selected' : ''}} value="unavailable">No Disponible
            </select>
        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Crear Producto</button>
        </div>
    </form>
@endsection
