<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $order = Order::firstOrCreate([
            'purchased' => false,
            'user_id' => $user->id,
        ]);
        return view('carrito.carrito', [
            'order' => $order,
        ]);
    }

    public function store(Request $request, $id) {
        $producto = Product::findOrFail($id);





        $user = Auth::user();
        $currentOrder = Order::firstOrCreate([
            'purchased' => false,
            'user_id' => $user->id,
        ]);

        $max = $producto->stock;
        $orderItem = $currentOrder->orderItems->where('product_id', $producto->id)->first();
        if ($orderItem) {
            $max -= $orderItem->quantity;
        }

        $request->validate([
            'quantity' => ['required', 'integer', 'max:' . $max],
        ]);

        $currentOrder->addProduct($producto, $request->quantity);

        return redirect()->back()->with('message', 'Producto agregado al <a href="' . route('carrito.index') . '">carrito</a>.');
    }

    public function update(Request $request, $id) {
        $producto = Product::findOrFail($id);

        $order = Auth::user()->currentOrder;
        $orderItem = $order->orderItems()->where('product_id', $producto->id)->firstOrFail();

        $request->validate([
            'quantity' => ['required', 'integer'],
        ]);

        $orderItem->update($request->all());

        return redirect()->back()->with('message', 'Producto actualizado');
    }

    public function delete(Request $request, $id) {
        $producto = Product::findOrFail($id);

        $order = Auth::user()->currentOrder;

        $order->deleteProduct($producto);

        return redirect()->back()->with('message', 'Producto removido del carrito');
    }

    public function purchase(Request $request) {

        $order = Auth::user()->currentOrder;

        $order->purchase();

        return redirect()->route('home.index')->with('message', 'Gracias por su compra!');
    }

}
