<?php


namespace App\Services;


use App\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    protected $cookieName = 'cart';


    public function getFromCookie()
    {
        $cartId = Cookie::get( $this->cookieName );
        return Cart::find( $cartId );
    }

    /**
     * @return Cart
     */
    public function getFromCookieOrCreate()
    {
        return $this->getFromCookie() ?? Cart::create();
    }

    /**
     * @param Cart $cart
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function makeCookie( Cart $cart )
    {
        return Cookie::make( $this->cookieName, $cart->id, 7 * 24 * 60 );
    }

    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if ( $cart != null ) {
            return $cart->products->pluck( 'pivot.quantity' )->sum();
        }

        return 0;
    }
}
