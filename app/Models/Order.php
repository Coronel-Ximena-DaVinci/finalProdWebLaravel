<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'purchased',
        'user_id',
    ];

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addProduct(Product $product, $quantity) {
        $orderItem = OrderItem::firstOrNew([
            'order_id' => $this->id,
            'product_id' => $product->id,
        ]);
        $orderItem->quantity = $orderItem->quantity ?: 0;
        $orderItem->quantity += $quantity;
        $orderItem->price += $product->price;
        $orderItem->save();

        return $orderItem;
    }

    public function deleteProduct(Product $product) {
        $orderItem = OrderItem::firstOrNew([
            'order_id' => $this->id,
            'product_id' => $product->id,
        ]);
        $orderItem->delete();
    }

}
