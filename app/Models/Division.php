<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public function yble($id) {
        $key = (int)$id;

        if(Division::whereJsonContains("acode->yble", $key)->exists()) {
            $data = Division::whereJsonContains("acode->yble", $key)->get();
            $info = $data[0]->id;
        } else {
            $info = 0;
        }

        return $info;
    }
}
