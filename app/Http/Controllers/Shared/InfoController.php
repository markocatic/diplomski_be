<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shared\InfoModel;

class InfoController extends Controller
{
    public function info()
    {
        $model = new InfoModel();

        $items = $model->getInfo();

        return response()->json($items, 200);
    }
}
