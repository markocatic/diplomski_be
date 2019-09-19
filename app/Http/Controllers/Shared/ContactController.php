<?php

namespace App\Http\Controllers\Shared;

use App\Models\Shared\ContactModel;
use Illuminate\Http\Request;

class ContactController
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|alpha',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'message' => 'required'
        ];

        $message = [];

        $validator = \Validator::make($request->all(), $rules, $message);
        $validator->validate();

        $model = new ContactModel();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->number = $request->number;
        $model->message = $request->message;

        $items = $model->store();

        if (empty($items)) {
            abort(404);
        }

        return response()->json($items, 200);
    }
}
