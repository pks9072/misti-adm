<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YbleController extends Controller
{
    public function goods() {
        $path = "http://y-ble.com/kspark/product-list.php";
        $test = json_decode(file_get_contents($path), true);


        $section = SectionController::yble($test["big"]);

        echo $section;

        echo "<pre>";
        print_r($test);
    }
}
