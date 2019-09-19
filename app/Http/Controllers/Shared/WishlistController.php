<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shared\WishlistModel;

class WishlistController extends Controller
{
    public function insert(Request $request)
    {
        $model = new WishlistModel();

        $model->user_id = $request->user_id;
        $model->product_id = $request->product_id;

        $item = $model->store();

        return response()->json($item, 200);
    }

    public function userList($id)
    {
        $model = new WishlistModel();
        $items = $model->getUserList($id);
        if ($items) {
            return response()->json($items, 200);
        } else {
            abort(404);
        }
    }

    public function deleteItem(Request $request, $userId)
    {
        $model = new WishlistModel();
        $productId = $request->getContent();
        $deleted = $model->delete($userId, $productId);

        return response()->json($deleted, 200);
    }
}
