<?php

namespace App\Models\admin;

use Illuminate\Support\Facades\DB;

class UserAdminModel
{
    public $name;
    public $email;
    public $password;
    public $role_id;

    private $table = "users";

    public function getAll()
    {
        return DB::table($this->table)
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->get();
    }

    public function getOne($id)
    {
        return DB::table($this->table)
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.id', $id)
            ->select('users.*', 'roles.name as role_name')
            ->first();
    }

    public function delete($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->delete();
    }
}
