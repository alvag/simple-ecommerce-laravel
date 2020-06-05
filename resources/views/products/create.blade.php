@extends('layouts.master')
@section('content')
    <h1>Crear un producto</h1>

    <form method="POST" action="{{route('products.store')}}">
        @csrf
        <div class="form-row">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-row">
            <label for="description">Descripción</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>

        <div class="form-row">
            <label for="price">Precio</label>
            <input type="text" name="price" id="price" min="1.00" step="0.01" class="form-control" required>
        </div>

        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="text" name="stock" id="stock" min="0" class="form-control" required>
        </div>

        <div class="form-row">
            <label for="status">Estado</label>
            <select class="custom-select" name="status" id="status" required>
                <option value="" selected>Seleccionar</option>
                <option value="available">Disponible</option>
                <option value="unavailable">No Disponible</option>
            </select>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Crear Producto</button>
        </div>
    </form>
@endsection
