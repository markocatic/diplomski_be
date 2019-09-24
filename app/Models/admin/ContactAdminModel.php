<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactAdminModel
{
    public $name;
    public $email;
    public $number;
    public $message;
    public $answered;

    private $table = "contact";

    public function getAll()
    {
        return DB::table($this->table)
            ->where('answered', 0)
            ->get();
    }

    public function getAnswered()
    {
        return DB::table($this->table)
            ->where('answered', 1)
            ->get();
    }

    public function insertAnswer($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update(['answered', 1]);
    }

    public function delete($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }
}
