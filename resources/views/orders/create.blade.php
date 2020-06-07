@extends('layouts.app')
@section('content')

    <h1>Detalles de la orden</h1>

    <h4 class="font-weight-bold">TOTAL: $ {{$cart->total}}</h4>

    <div class="mb-3">
        <form method="POST"
              action="{{route('orders.store')}}"
              class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Confirmar orden</button>
        </form>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart->products as $product)
                <tr>
                    <td>
                        <img src="{{asset($product->images->first()->path)}}" alt="" width="100">
                        {{$product->title}}
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td class="font-weight-bold">
                        $ {{$product->total}}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
