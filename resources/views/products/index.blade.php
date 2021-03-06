@extends('layouts.app')
@section('content')

    <h1>Lista de Productos</h1>

    <a class="btn btn-success mb-3" href="{{route('products.create')}}">Crear</a>

    @empty($products)
        <div class="alert alert-warning">
            No hay productos disponibles
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        @include('components.product-card')
                        <td>
                            <a class="btn btn-link" href="{{route('products.show', ['product'=>$product->id])}}">Ver</a>
                            <a class="btn btn-link"
                               href="{{route('products.edit', ['product'=>$product->id])}}">Editar</a>
                            <form method="POST" class="d-inline"
                                  action="{{route('products.destroy', ['product'=>$product->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endempty
@endsection
