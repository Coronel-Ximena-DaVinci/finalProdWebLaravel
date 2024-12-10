<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productos = Product::query();

        if ($request->name) {
            $productos->where('name', 'like', '%' .  $request->name . '%');
        }

        $request->session()->flashInput($request->all());
        return view('products.index', [
            'productos' => $productos->paginate(5),
        ]);
    }

    public function create(Request $request)
    {
        return view('products.create', [
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:products,name'],
            'description' => ['required'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('message', 'Producto creado');
    }

    public function edit(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        return view('products.edit', [
            'producto' => $producto,
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }
    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $request->validate([
            'name' => ['required', 'unique:products,name,' . $producto->id],
            'description' => ['required'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $producto->update($request->all());
        return redirect()->route('products.index')->with('message', 'Producto modificado');
        
    }
    public function delete(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect()->route('products.index')->with('message', 'Producto eliminado');
        
    }
}
