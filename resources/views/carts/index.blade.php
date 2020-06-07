@extends('layouts.app')
@section('content')
    <h1>Tu carrito de compras</h1>

    @if(!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            No tienes productos en tu carrito
        </div>
    @else
        <h4 class="font-weight-bold">TOTAL: $ {{$cart->total}}</h4>
        <a class="btn btn-success mb-3" href="{{route('orders.create')}}">Crear Orden</a>
        <div class="row">
            @foreach($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif


@endsection
