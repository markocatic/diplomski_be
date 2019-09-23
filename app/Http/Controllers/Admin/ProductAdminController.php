<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\ImageAdminModel;
use App\Models\admin\ProductAdminModel;

class ProductAdminController extends Controller
{
    public function save(Request $request)
    {
        $productModel = new ProductAdminModel();
        $productImage = new ImageAdminModel();

        $pictureDirectory = public_path('images/products/');
        $picturePath = $request->file('image');
        $pictureName = "product_" . time() . ".jpg";
        $picturePath->move($pictureDirectory, $pictureName);

        $productImage->path = "images/products/" . $pictureName;
        $productImage->name = "image";

        $productModel->image_id = $productImage->store();
        $productModel->brand_id = $request->brand_id;
        $productModel->name = $request->name;
        $productModel->price = $request->price;
        $productModel->description = $request->description;
        $productModel->description_short = $request->description_short;
        $productModel->new_item = $request->new_item;

        $items = $productModel->save();
        return response()->json($items, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->getContent();
        $product = new ProductAdminModel();
        $picture = new ImageAdminModel();

        $test = $product->delete($id);

        return response()->json($test, 200);
    }
}
