<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $max = $producto->stock;

        $currentOrder = Auth::user() ? Auth::user()->currentOrder : null;
        if ($currentOrder) {
            $orderItem = $currentOrder->orderItems->where('product_id', $producto->id)->first();
            if ($orderItem) {
                $max -= $orderItem->quantity;
            }
        }
        return view('catalogo.detalle', [
            'producto' => $producto,
            'max' => $max,
        ]);
    }
}
