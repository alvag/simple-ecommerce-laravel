@extends('layouts.app')
@section('content')
    <h1>Editar producto</h1>

    <form method="POST" action="{{route('products.update', ['product' => $product->id])}}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Título</label>
            <input value="{{old('title') ? old('title') : $product->title}}" type="text" name="title" id="title"
                   class="form-control" required>
        </div>

        <div class="form-row">
            <label for="description">Descripción</label>
            <input value="{{old('description') ? old('description') : $product->description}}" type="text"
                   name="description" id="description"
                   class="form-control" required>
        </div>

        <div class="form-row">
            <label for="price">Precio</label>
            <input value="{{old('price') ? old('price') : $product->price}}" type="text" name="price" id="price"
                   min="1.00" step="0.01"
                   class="form-control" required>
        </div>

        <div class="form-row">
            <label for="stock">Stock</label>
            <input value="{{old('stock') ? old('stock') : $product->stock}}" type="text" name="stock" id="stock" min="0"
                   class="form-control"
                   required>
        </div>

        <div class="form-row">
            <label for="status">Estado</label>
            <select class="custom-select" name="status" id="status" required>
                <option
                    {{ old('status') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '')}} value="available">
                    Disponible
                </option>
                <option
                    {{ old('status') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '')}} value="unavailable">
                    No Disponible
                </option>
            </select>
        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Editar Producto</button>
        </div>
    </form>
@endsection
