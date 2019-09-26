<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\OrderAdminModel;

class OrderAdminController
{
    public function getOrders()
    {
        $model = new OrderAdminModel();

        $orders = $model->getOrders();

        if ($orders != null) {
            return response()->json($orders, 200);
        }
    }

    public function deleteOrder(Request $request)
    {
        $id = $request->getContent();

        $model = new OrderAdminModel();

        $deleted = $model->deleteOrder($id);

        if ($deleted != null) {
            return response()->json($deleted, 200);
        }
    }

    public function getUserOrders($id)
    {
        $model = new OrderAdminModel();

        $userOrders = $model->getUserOrders($id);

        if ($userOrders != null) {
            return response()->json($userOrders, 200);
        }
    }
}
