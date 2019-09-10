<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel
{
    public $name;
    public $email;
    public $password;
    public $role_id;

    private $table = "users";

    public function create() {
        return DB::table($this->table)
        ->insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role_id' => 2,
        ]);
     }
}
