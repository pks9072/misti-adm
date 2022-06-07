<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function grp()
    {
        return $this->belongsTo(Grp::class);
    }


    public function list($arr) {
        $data = json_decode($arr, true);

        $list = Good::where(function($q) use($data) {
            if(!empty($data["state"])) {
                $q->where("state", $data["state"]);
            }
        })->orWhere(function($q) use($data) {
            if(!empty($data["keyword"])) {
                $q->orWhere("name", "like", "%".$data["keyword"]."%")->orWhere("tag", "like", "%".$data["keyword"]."%");
            }
        })->orderBy("created_at", "desc")->paginate(15);
        return $list;
    }
}
