<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderModel
{
    public $cart_id;
    public $user_id;
    public $product_id;
    public $date;
    private $table = "order";

    public function store()
    {
        return DB::table($this->table)
        ->insert([
            'cart_id' => $this->cart_id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'date' => date('Y-m-s')
        ]);
    }
}
