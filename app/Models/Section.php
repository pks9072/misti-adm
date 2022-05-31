<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function list() {
        $list = Section::where()->orderBy("sort", "asc");
        return $list;
    }
}
