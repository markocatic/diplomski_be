<?php

namespace App\Models\Shared;

use Illuminate\Support\Facades\DB;


class WishlistModel
{
    # properties

    public $user_id;
    public $product_id;

    private $table = "wishlist";

    public function store()
    {
        return DB::table($this->table)
            ->insert([
                'user_id' => $this->user_id,
                'product_id' => $this->product_id
            ]);
    }

    public function getUserList($id)
    {
        return DB::table($this->table)
            ->join('products', 'wishlist.product_id', '=', 'products.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('user_id', $id)
            ->select('products.*', 'wishlist.*', 'product_images.path as image_path')
            ->get();
    }

    public function delete($id)
    {
        return DB::table($this->table)
            ->where('product_id', $id)
            ->delete();
    }
}
