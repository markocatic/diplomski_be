<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InfoModel
{
    # properties
    public $location;
    public $location2;
    public $email;
    public $phone;

    private $table = "info";


    public function getInfo()
    {
        return DB::table($this->table)
            ->get()
            ->first();
    }
}
