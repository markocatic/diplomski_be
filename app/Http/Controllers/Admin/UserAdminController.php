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

    public function save(Request $request)
    {
        $rules = [
            'name' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|min:3|max:20'
        ];

        $message = [];
        $validator = \Validator::make($request->all(), $rules, $message);
        $validator->validate();

        $model = new UserAdminModel();

        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = $request->password;
        $model->role_id = $request->role_id;

        $items = $model->save();
        return response()->json($items, 200);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|alpha',
            'email' => 'required|email',
            'password' => 'required|min:3|max:20',
        ];

        $message = [];
        $validator = \Validator::make($request->all(), $rules, $message);
        $validator->validate();

        $model = new UserAdminModel();

        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = $request->password;
        $model->role_id = $request->role_id;

        $items = $model->update($id);
        return response()->json($items, 200);
    }
}
