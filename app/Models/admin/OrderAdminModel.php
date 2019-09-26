<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderAdminModel
{
    public $cart_id;
    public $user_id;
    public $product_id;
    public $date;

    private $table = "order";

    public function getOrders()
    {
        return DB::table($this->table)
            ->join('users', 'order.user_id', '=', 'users.id')
            ->join('products', 'order.product_id', '=', 'products.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->orderBy('order.date', 'desc')
            ->select('order.*', 'users.name as userName', 'products.name as productName', 'product_images.path as image', 'products.price as price')
            ->get();
    }


    public function deleteOrder($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }


    public function getUserOrders($id)
    {
        return DB::table($this->table)
            ->join('users', 'order.user_id', '=', 'users.id')
            ->join('products', 'order.product_id', '=', 'products.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('order.user_id', $id)
            ->orderBy('order.date', 'desc')
            ->select('order.*', 'users.name as userName', 'products.name as productName', 'product_images.path as image', 'products.price as price')
            ->get();
    }
}
