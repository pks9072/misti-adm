<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ["bname_k", "bname_e", "state"];

    public function list($arr) {
        $data = json_decode($arr, true);

        $list = Brand::where(function($q) use($data) {
            if(!empty($data["state"])) {
                $q->where("state", $data["state"]);
            }
        })->orWhere(function($q) use($data) {
            if(!empty($data["keyword"])) {
                $q->orWhere("bname_k", "like", "%".$data["keyword"]."%")->orWhere("bname_e", "like", "%".$data["keyword"]."%");
            }
        })->orderBy("created_at", "desc")->paginate(15);
        return $list;
    }

    public function info($id) {
        if(Brand::where("id", $id)->exists()) {
            $info = Brand::where("id", $id)->get();
        } else {
            $info = false;
        }

        return $info;
    }

    public function yble($id) {
        if(Brand::whereJsonContains("acode->yble", $id)->exists()) {
            $data = Brand::whereJsonContains("acode->yble", $id)->get();
            $info = $data[0]->id;
        } else {
            $info = false;
            dd($id);
        }

        return $info;
    }
}
