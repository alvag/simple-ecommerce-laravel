<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

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

    public function store( ProductRequest $request )
    {
        $product = Product::create( $request->validated() );

        return redirect()
            ->route( 'products.index' )
//            ->with( ['success' => "El producto con id {$product->id} ha sido creado"] )
            ->withSuccess( "El producto con id {$product->id} ha sido creado" );
    }

    public function show( Product $product )
    {
//        $product = Product::findOrFail( $product );

        return view( 'products.show' )->with( [
            'product' => $product
        ] );
    }

    public function edit( Product $product )
    {
        return view( 'products.edit' )->with( [
            'product' => $product
        ] );
    }

    public function update( ProductRequest $request, Product $product )
    {
//        $product = Product::findOrFail( $product );

        $product->update( $request->validated() );
        return redirect()
            ->route( 'products.index' )
            ->withSuccess( "El producto con el id {$product->id} fue editado" );
    }

    public function destroy( Product $product )
    {
//        $product = Product::findOrFail( $product );

        $product->delete();
        return redirect()
            ->route( 'products.index' )
            ->withSuccess( "El producto con el id {$product->id} fue eliminado" );
    }
}
