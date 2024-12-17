<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        $productos = Product::query();

        if ($request->name) {
            $productos->where('name', 'like', '%' .  $request->name . '%');
        }

        $request->session()->flashInput($request->all());
        return view('catalogo.catalogo', [
            'productos' => $productos->paginate(),
        ]);
    }

    public function search(Request $request) {}

    public function show(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        return view('catalogo.detalle', [
            'producto' => $producto,
        ]);
    }
}
