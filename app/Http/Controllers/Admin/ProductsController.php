<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productos = Product::query();

        if ($request->name) {
            $productos->where('name', 'like', '%' .  $request->name . '%');
        }

        $request->session()->flashInput($request->all());
        return view('admin.products.index', [
            'productos' => $productos->paginate(5),
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
        $request->validate([
            'name' => ['required', 'unique:products,name'],
            'description' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['required', 'file', 'mimetypes:image/*'],
        ]);

        Product::create($request->all());
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
        $request->validate([
            'name' => ['required', 'unique:products,name,' . $producto->id],
            'description' => ['required'],
            'stock' => ['required'],
            'price' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'file', 'mimetypes:image/*'],
        ]);
        $this->save($producto, $request);


        return redirect()->route('admin.products.index')->with('message', 'Producto modificado');

    }
    protected function save(Product $producto, Request $request){
        DB::transaction(function () use ($producto, $request) {
            $producto->update($request->all());
            if ($request->image) {
                $ds = DIRECTORY_SEPARATOR;
                $path = "products{$ds}{$producto->id}{$ds}image";
                $filename = $request->image->getClientOriginalName();
                $old = $producto->image;

                /**
                 * @var Illuminate\Filesystem\FilesystemAdapter $storage
                 */
                $storage = Storage::disk('public');
                if ($old) {
                    Storage::disk('public')->delete($producto->image);
                }
                $storage->putFileAs($path, $request->image, $filename);
                $producto->image = $path . $ds . $filename;
                $producto->save();
            }
        });
    }


    public function delete(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect()->route('admin.products.index')->with('message', 'Producto eliminado');

    }
}
