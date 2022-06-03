<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Section;
use App\Models\Grp;
use Illuminate\Http\Request;

class YbleController extends Controller
{
    public function __construct() {
        $this->SectionModel = new Section();
        $this->DivisionModel = new Division();
        $this->GrpModel = new Grp();
    }

    public function goods() {
        $path = "http://y-ble.com/kspark/product-list.php";
        $test = json_decode(file_get_contents($path), true);

        $data = $img = array();
        foreach($test["body"] as $row) {
            unset($images);

            $file   = "https://m.y-ble.com";
            $thumb  = (!empty($row["upfile3"])) ? $file."/".$row["updir"]."/".$row["upfile3"] : "";
            $list   = (!empty($row["upfile2"])) ? $file."/".$row["updir"]."/".$row["upfile2"] : "";
            $detail = (!empty($row["upfile1"])) ? $file."/".$row["updir"]."/".$row["upfile1"] : "";

            $img["thumb"]   = $thumb;
            $img["list"]    = $list;
            $img["detail"]  = $detail;

            $images = json_encode($img);

            $record = [
                "affiliate_id"  => 1,
                "aidx"          => $row["no"],
                "brand_id"      => $row["xbig"],
                "section_id"    => $this->SectionModel->yble($row["big"]),
                "division_id"   => $row["mid"],
                "grp_id"        => $row["small"],
                "name"          => $row["name"],
                "normal_price"  => $row["normal_prc"],
                "price"         => $row["sell_prc"],
                "images"        => $images,
                "contents"      => $row["content2"],
                "tag"           => $row["keyword"],
                "state"         => 1
            ];

            $data[] = $record;
        }

        //$section = (new SectionController())->yble($test["big"]);

        //echo $section;

        echo "<pre>";

        print_r($data);
        print_r($test["body"]);
    }
}
