<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Models\Shared\CartModel;

class CartController
{
    public function getUserCart($id)
    {
        $model = new CartModel();
        $items = $model->getUserCart($id);

        return response()->json($items, 200);
    }

    public function AddItemToCart(Request $request)
    {
        $model = new CartModel();

        $model->user_id = $request->user_id;
        $model->product_id = $request->product_id;
        $model->quantity = $request->quantity;

        $items = $model->AddItemToCart();

        return response()->json($items,200);
    }

    public function deleteItemFromCart(Request $request) {
        $model = new CartModel();
        $body = $request->getContent();
        try{
            $item = $model->deleteItemFromCart($body);
        }
            catch(Exception $e){
                Log::error($e->getMessage);
            }
        
        return response()->json($item, 200);
    }
}
