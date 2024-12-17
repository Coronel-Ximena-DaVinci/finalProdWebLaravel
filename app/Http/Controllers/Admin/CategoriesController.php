<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Category::query()->withCount('products');

        if ($request->name) {
            $categorias->where('name', 'like', '%' .  $request->name . '%');
        }

        $request->session()->flashInput($request->all());
        return view('admin.categories.index', [
            'categorias' => $categorias->paginate(5),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.categories.create', [
            'categories' => Category::query()->pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name']
        ]);

        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('message', 'Categoria creada');
    }

    public function edit(Request $request, $id)
    {
        $categoria = Category::findOrFail($id);

        return view('admin.categories.edit', [
            'categoria' => $categoria,
        ]);
    }
    public function update(Request $request, $id)
    {
        $categoria = Category::findOrFail($id);
        $request->validate([
            'name' => ['required', 'unique:categories,name,' . $categoria->id],
        ]);
        $this->save($categoria, $request);

        return redirect()->route('admin.categories.index')->with('message', 'Categoria modificada');
    }

    protected function save(Category $categoria, Request $request)
    {
        $categoria->update($request->all());
    }

    public function delete(Request $request, $id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        return redirect()->route('admin.categories.index')->with('message', 'Categoria eliminada');
    }
}
