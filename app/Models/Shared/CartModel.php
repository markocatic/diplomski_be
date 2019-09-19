<?php

namespace App\Models\Shared;

use Illuminate\Support\Facades\DB;


class CartModel
{
    public $user_id;
    public $product_id;
    public $quantity;
    private $table = "cart";

    public function getUserCart($id)
    {
        return DB::table($this->table)
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('user_id', $id)
            ->select('cart.*', 'products.name as name', 'product_images.path as picture', 'products.price as price')
            ->get();
    }

    public function AddItemToCart()
    {
        return DB::table($this->table)
            ->insert([
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity
            ]);
    }

    public function deleteItemFromCart($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function editItemInCart($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update([
                'quantity' => $this->quantity
            ]);
    }

    public function checkout($id)
    {
        return DB::table($this->table)
            ->where('user_id', $id)
            ->delete();
    }

    public function selectUserCart($id)
    {
        return DB::table($this->table)
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->select('cart.id as cart_id', 'cart.user_id as user_id', 'cart.product_id as product_id', 'products.name as name', 'product_images.path as picture', 'products.price as price', 'cart.quantity as quantity')
            ->where('user_id', $id)
            ->get();
    }
}
