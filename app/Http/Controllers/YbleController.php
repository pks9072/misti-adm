<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YbleController extends Controller
{
    public function goods() {
        $path = "http://y-ble.com/kspark/product-list.php";
        $test = json_decode(file_get_contents($path), true);

        $data = $img = array();
        foreach($test["body"] as $row) {
            unset($images);

            $img["thumb"] = $row["updir"]."/".$row["upfile3"];
            $img["list"] = $row["updir"]."/".$row["upfile2"];
            $img["detail"] = $row["updir"]."/".$row["upfile1"];

            $images = json_encode($img);

            $record = [
                "affiliate_id"  => 1,
                "aidx"          => $row["no"],
                "brand_id"      => $row["xbig"],
                "section_id"    => $row["big"],
                "division_id"   => $row["mid"],
                "grp_id"        => $row["small"],
                "name"          => $row["name"],
                "normal_price"  => $row["normal_prc"],
                "price"         => $row["sell_prc"],
                "images"        => $images,
                "contents"      => $row["content2"],
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
