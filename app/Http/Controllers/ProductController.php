<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function create()
    {
        return 'Respuesta desde controlador';
    }

    public function store()
    {
        return 'Respuesta desde controlador';
    }

    public function show($product)
    {
        return view('products.show');
    }

    public function edit($product)
    {
        return 'Respuesta desde controlador';
    }

    public function update($product)
    {
        return 'Respuesta desde controlador';
    }

    public function destroy($product)
    {
        return 'Respuesta desde controlador';
    }

}
