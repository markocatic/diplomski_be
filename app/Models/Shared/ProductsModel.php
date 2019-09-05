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
    
    private $table = 'products';

    public function getSamsungProducts() {
        return DB::table($this->table)
        ->join('brands', 'products.brand_id' ,'=', 'brands.id')
        ->join('product_images', 'products.image_id', '=', 'product_images.id')
        ->where('brand_id', '=', '1')
        ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
        ->get();
    }

    public function getIphoneProducts() {
        return DB::table($this->table)
        ->join('brands', 'products.brand_id' ,'=', 'brands.id')
        ->join('product_images', 'products.image_id', '=', 'product_images.id')
        ->where('brand_id', '=', '2')
        ->select('products.*', 'brands.name as brand', 'product_images.path as image_path')
        ->get();
    }


}
