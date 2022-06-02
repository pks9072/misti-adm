<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $css = "category";
    private $m1 = "goods";
    private $m2 = "brand";

    public function __construct() {
        $this->SectionModel = new Section();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->SectionModel->list();

        $data = [
            "css" => $this->css,
            "m1" => $this->m1,
            "m2" => $this->m2,
            "list" => $list,
        ];

        return view("category.section-index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
