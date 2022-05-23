<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function list($arr) {
        $data = json_decode($arr, true);
        $list = Brand::where(function ($q) use ($data){
            foreach ($data as $key => $value) {
                if(!empty($value)) {
                    $q->where($key, "like", "%".$value."%");
                }
            }
        })->orderBy("created_at", "desc")->paginate(15);
        return $list;
    }
}
