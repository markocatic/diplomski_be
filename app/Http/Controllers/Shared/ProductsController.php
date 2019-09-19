<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shared\ProductsModel;

class ProductsController
{
    public function getSamsungProducts()
    {
        $model = new ProductsModel();
        $products = $model->getSamsungProducts();

        return response()->json($products, 200);
    }

    public function getOneProduct($id)
    {
        $model = new ProductsModel();
        $product = $model->getOneProduct($id);

        return response()->json($product, 200);
    }

    public function getIphoneProducts()
    {
        $model = new ProductsModel();
        $products = $model->getIphoneProducts();

        return response()->json($products, 200);
    }

    public function getAllProducts()
    {
        $model = new ProductsModel();
        $products = $model->getAllProducts();

        return response()->json($products, 200);
    }

    public function getNewProducts()
    {
        $model = new ProductsModel();
        $products = $model->getNewProducts();

        return response()->json($products, 200);
    }

    public function getTvProducts()
    {
        $model = new ProductsModel();
        $products = $model->getTvProducts();

        return response()->json($products, 200);
    }

    public function getLaptopProducts()
    {
        $model = new ProductsModel();
        $products = $model->getLaptopProducts();

        return response()->json($products, 200);
    }
}
