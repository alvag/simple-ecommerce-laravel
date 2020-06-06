@extends('layouts.app')
@section('content')
    <h1>Tu carrito de compras</h1>

    @if($cart->products->isEmpty())
        <div class="alert alert-warning">
            No tienes productos en tu carrito
        </div>
    @else
        <div class="row">
            @foreach($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif


@endsection
