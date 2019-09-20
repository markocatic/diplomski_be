<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Models\Shared\CartModel;
use App\Models\Shared\OrderModel;

class CartController
{
    public function getUserCart(Request $request)
    {
        $id = $request->getContent();
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

        return response()->json($items, 200);
    }

    public function deleteItemFromCart(Request $request)
    {
        $model = new CartModel();
        $body = $request->getContent();
        try {
            $item = $model->deleteItemFromCart($body);
        } catch (Exception $e) {
            Log::error($e->getMessage);
        }

        return response()->json($item, 200);
    }

    public function editItemInCart(Request $request, $id)
    {
        $model = new CartModel();
        $model->quantity = $request->quantity;


        $item = $model->editItemInCart($id);


        return response()->json($item, 200);
    }


    public function selectUserCart($id)
    {
        $model = new CartModel();
        $items = $model->selectUserCart($id);
        return $items;
    }

    public function checkout(Request $request)
    {
        $id = $request->getContent();
        $cartModel = new CartModel();
        $orderModel = new OrderModel();
        $items = $this->selectUserCart($id);

        foreach ($items as $item) {
            $orderModel->cart_id = $item->cart_id;
            $orderModel->user_id = $item->user_id;
            $orderModel->product_id = $item->product_id;

            $order = $orderModel->store();
        }



        $cartModel->checkout($id);

        return response()->json($items, 200);
    }
}
