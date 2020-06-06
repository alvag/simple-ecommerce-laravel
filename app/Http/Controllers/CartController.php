<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public $cartService;

    public function __construct( CartService $cartService )
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view( 'carts.index' )->with( [
            'cart' => $this->cartService->getFromCookieOrCreate()
        ] );
    }

}
