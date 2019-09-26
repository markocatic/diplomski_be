<?php

namespace App\Models\admin;

use Illuminate\Support\Facades\DB;

class ProductAdminModel
{
    public $name;
    public $brand_id;
    public $price;
    public $image_id;
    public $description_short;
    public $description;
    public $new_item;

    private $table = "products";

    // public function getAll() {
    //     return DB::table($this->table)
    //         ->join('product_images', 'products.image_id', '=', 'product_images.id')
    //         ->join('brands', 'products.brand_id', '=', 'brands.id')
    //         ->select('products.*', 'product_images.path as image_path', 'brands.name as brand')
    //         ->orderBy('date_arrive', 'desc')
    //         ->get();
    // }

    public function getAllProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }

    public function id_image($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->select('products.image_id as id')
            ->get()
            ->first();
    }

    public function getOneProduct($id)
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('products.id', $id)
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path', 'product_images.id as image_id')
            ->first();
    }

    public function save()
    {
        return DB::table($this->table)
            ->insert([
                'name' => $this->name,
                'brand_id' => $this->brand_id,
                'price' => $this->price,
                'description' => $this->description,
                'description_short' => $this->description_short,
                'image_id' => $this->image_id,
                'new_item' => $this->new_item
            ]);
    }

    public function delete($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }

    public function update($id)
    {
        $updated = [
            'name' => $this->name,
            'brand_id' => $this->brand_id,
            'price' => $this->price,
            'description' => $this->description,
            'description_short' => $this->description_short,
            'new_item' => $this->new_item
        ];

        if ($this->image_id != null) {
            $updated['image_id'] = $this->image_id;
        }

        return DB::table($this->table)
            ->where('id', $id)
            ->update($updated);
    }
}
