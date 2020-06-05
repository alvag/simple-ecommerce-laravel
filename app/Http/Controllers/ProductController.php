<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view( 'products.index' )->with( [
            'products' => Product::all()->sortByDesc( 'id' )
        ] );
    }

    public function create()
    {
        return view( 'products.create' );
    }

    public function store()
    {
        Product::create( request()->all() );
        return redirect()->route( 'products.index' );
    }

    public function show( $product )
    {
        $product = Product::findOrFail( $product );
        return view( 'products.show' )->with( [
            'product' => $product
        ] );
    }

    public function edit( $product )
    {
        return view( 'products.edit' )->with( [
            'product' => Product::findOrFail( $product )
        ] );
    }

    public function update( $product )
    {
        $product = Product::findOrFail( $product );
        $product->update( request()->all() );
        return redirect()->route( 'products.index' );
    }

    public function destroy( $product )
    {
        $product = Product::findOrFail( $product );
        $product->delete();
        return redirect()->route( 'products.index' );
    }
}
