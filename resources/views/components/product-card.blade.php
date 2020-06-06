<div class="card">
    <img class="card-img-top" src="{{asset($product->images->first()->path)}}" alt="" height="500">
    <div class="card-body">
        <h4 class="text-right font-weight-bold">$ {{$product->price}}</h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <p class="card-text font-weight-bold">Stock: {{$product->stock}}</p>
        <form method="POST"
              action="{{route('products.carts.store', ['product' => $product->id])}}"
              class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Agregar al Carrito</button>
        </form>
    </div>
</div>
