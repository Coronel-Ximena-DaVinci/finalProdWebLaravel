<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productos = Product::query();

        if ($request->name) {
            $productos->where('name', 'like', '%' .  $request->name . '%');
        }

        if ($request->category_id) {
            $productos->where('category_id', $request->category_id);
        }

        $request->session()->flashInput($request->all());
        return view('admin.products.index', [
            'productos' => $productos->paginate(5),
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.products.create', [
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $producto = new Product();
        $this->save($producto, $request);

        return redirect()->route('admin.products.index')->with('message', 'Producto creado');
    }

    public function edit(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        return view('admin.products.edit', [
            'producto' => $producto,
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $request->validate($this->rules($producto));

        $this->save($producto, $request);

        return redirect()->route('admin.products.index')->with('message', 'Producto modificado');
    }

    protected function save(Product $producto, Request $request)
    {
        DB::transaction(function () use ($producto, $request) {
            $producto->fill($request->all());
            $producto->save();
            if ($request->image) {
                $producto->saveImage($request->image);
            }
        });
    }

    public function delete(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();

        return redirect()->route('admin.products.index')->with('message', 'Producto eliminado');
    }

    protected function rules($producto = null)
    {
        return [
            'name' => ['required', 'unique:products,name,' . ($producto ? $producto->id : 'NULL')],
            'description' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'file', 'mimetypes:image/*'],
        ];
    }
}
