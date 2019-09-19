<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsModel
{
    public $name;
    public $description;
    public $description_short;
    public $price;
    public $brand_id;
    public $image_id;
    public $new;

    private $table = 'products';

    public function getSamsungProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('brand_id', '=', '1')
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }

    public function getIphoneProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('brand_id', '=', '2')
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }

    public function getAllProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }

    public function getOneProduct($id)
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('products.id', $id)
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->first();
    }

    public function getNewProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('products.new_item', 1)
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }

    public function getLaptopProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('brand_id', '=', '4')
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }

    public function getTvProducts()
    {
        return DB::table($this->table)
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_images', 'products.image_id', '=', 'product_images.id')
            ->where('brand_id', '=', '3')
            ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
            ->get();
    }
}
