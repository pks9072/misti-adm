<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grp extends Model
{
    use HasFactory;

    public function yble($data) {
        $section = match($data) {
            "1001"  => 1,       // WOMAN
            "1002"  => 2,       // MEN
            "1309"  => 3,       // GOLF
            "1438"  => 4,       // LUXURY
            "1308"  => 5,       // JEWELRY
            "1307"  => 6,       // COSMETICS
            "1306"  => 7,       // LIFE
            "1458"  => 8,       // PET
        };

        return $section;
    }
}
