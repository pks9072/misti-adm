<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    private $css = "category";
    private $m1 = "goods";
    private $m2 = "goods";

    public function __construct() {
        $this->GoodModel = new Good();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $par["keyword"] = $request->keyword;
        $par["state"] = $request->state;

        $arr = json_encode($par);
        $list = $this->GoodModel->list($arr);

        $data = [
            "css" => $this->css,
            "m1" => $this->m1,
            "m2" => $this->m2,
            "list" => $list,
            "val" => $par
        ];

        return view("goods.index")->with($data);
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
        $validated = $request->validate([
            "affiliate_id" => "numeric|max:11",
            "aidx" => "max:255",
            "brand_id" => "required|numeric|max:11",
            "section_id" => "required|numeric|max:11",
            "division_id" => "required|numeric|max:11",
            "grp_id" => "required|numeric|max:11",
            "name" => "required|max:255",
            "normal_price" => "required|numeric|max:11",
            "sale_price" => "numeric|max:11",
            "price" => "required|numeric|max:11",
//            "images" => "required|numeric|max:11",
            "contents" => "required",
            "state" => "required|numeric|max:11"
        ]);

        Good::create($validated);
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
}
