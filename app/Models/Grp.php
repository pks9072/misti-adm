<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grp extends Model
{
    use HasFactory;

    public function yble($id) {
        $key = (int)$id;

        if(Grp::whereJsonContains("acode->yble", $key)->exists()) {
            $data = Grp::whereJsonContains("acode->yble", $key)->get();
            $info = $data[0]->id;
        } else {
            $info = false;
        }

        return $info;
    }
}
