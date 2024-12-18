<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        $productos = Product::query();

        if ($request->q) {
            $productos->where('name', 'like', '%' .  $request->q . '%');
        }

        if ($request->category_id) {
            $productos->where('category_id', $request->category_id);
        }

        $request->session()->flashInput($request->all());
        return view('catalogo.catalogo', [
            'productos' => $productos->paginate(6),
        ]);
    }

    public function show(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        return view('catalogo.detalle', [
            'producto' => $producto,
        ]);
    }
}
