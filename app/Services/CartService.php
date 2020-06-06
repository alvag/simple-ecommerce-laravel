<?php


namespace App\Services;


use App\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    /**
     * @return Cart
     */
    public function getFromCookieOrCreate()
    {
        $cartId = Cookie::get( 'cart' );
        $cart = Cart::find( $cartId );
        return $cart ?? Cart::create();
    }
}
