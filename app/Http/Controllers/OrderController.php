<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public $cartService;

    public function __construct( CartService $cartService )
    {
        $this->cartService = $cartService;
        $this->middleware( 'auth' );
    }

    public function create()
    {
        $cart = $this->cartService->getFromCookie();

        if ( !isset( $cart ) || $cart->products->isEmpty() ) {
            return redirect()
                ->back()
                ->withErrors( 'El carrito de compras está vacío' );
        }

        return view( 'orders.create' )->with( [
            'cart' => $cart
        ] );
    }

    public function store( Request $request )
    {
        $user = $request->user();

        $order = $user->orders()->create();

        $cart = $this->cartService->getFromCookie();

        $cartProductsWithQuantity = $cart->products->mapWithKeys( function ( $product ) {
            $element[ $product->id ] = [ 'quantity' => $product->pivot->quantity ];
            return $element;
        } );

        $order->products()->attach( $cartProductsWithQuantity->toArray() );

        return redirect()->route( 'orders.payment.create', [ 'order' => $order ] );
    }

}
