<?php

namespace App\Models\Shared;

use Illuminate\Support\Facades\DB;

class ContactModel
{
    public $name;
    public $email;
    public $number;
    public $message;
    public $answered;

    private $table = 'contact';

    public function store()
    {
        return DB::table($this->table)
            ->insertGetId([
                'name' => $this->name,
                'email' => $this->email,
                'number' => $this->number,
                'message' => $this->message,
                'answered' => 0
            ]);
    }
}
