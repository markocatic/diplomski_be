<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\UserAdminModel;
use Illuminate\Http\Request;

class UserAdminController
{
    public function getAllUsers()
    {
        $model = new UserAdminModel();

        $users = $model->getAll();

        return response()->json($users, 200);
    }

    public function getOneUser($id)
    {
        $model = new UserAdminModel();
        $users = $model->getOne($id);
        return response()->json($users, 200);
    }

    public function delete(Request $request)
    {
        $body = $request->getContent();
        $model = new UserAdminModel();

        $user = $model->delete($body);

        return response()->json($user, 200);
    }
}
