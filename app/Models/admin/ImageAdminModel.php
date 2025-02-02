<?php

namespace App\Models\admin;

use Illuminate\Support\Facades\DB;


class ImageAdminModel
{
    public $name;
    public $path;
    private $table = "product_images";

    public function store()
    {
        return DB::table($this->table)
            ->insertGetId([
                'alt' => $this->name,
                'path' => $this->path
            ]);
    }

    public function delete($id)
    {
        return DB::table($this->table)
            ->delete($id);
    }

    public function getOne($id)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->get('picture.*')
            ->first();
    }
}
