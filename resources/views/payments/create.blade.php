@extends('layouts.app')
@section('content')

    <h1>Detalles del pago</h1>

    <h4 class="font-weight-bold">TOTAL: $ {{$order->total}}</h4>

    <div class="mb-3">
        <form method="POST"
              action="{{route('orders.payment.store', ['order' => $order->id])}}"
              class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Pagar</button>
        </form>
    </div>


@endsection
