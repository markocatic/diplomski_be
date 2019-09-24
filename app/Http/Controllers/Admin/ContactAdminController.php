<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\ContactAdminModel;

class ContactAdminController
{
    public function getAllContact()
    {
        $model = new ContactAdminModel();
        $items = $model->getAll();

        return response()->json($items, 200);
    }

    public function getAnsweredContact()
    {
        $model = new ContactAdminModel();
        $items = $model->getAnswered();

        return response()->json($items, 200);
    }

    public function insertAnswer(Request $request)
    {
        $id = $request->getContent();

        $model = new ContactAdminModel();

        $item = $model->insertAnswer($id);

        return response()->json($item, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->getContent();

        $model = new ContactAdminModel();

        $item = $model->delete($id);

        return response()->json($item, 200);
    }
}
