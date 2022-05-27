<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $css = "category";
    private $m1 = "goods";
    private $m2 = "brand";

    public function __construct() {
        $this->BrandModel = new Brand();
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
        $list = $this->BrandModel->list($arr);

        $data = [
            "css" => $this->css,
            "m1" => $this->m1,
            "m2" => $this->m2,
            "list" => $list,
            "val" => $par
        ];

        return view("brand.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "css" => $this->css,
            "m1" => $this->m1,
            "m2" => $this->m2,
        ];

        return view("brand.create")->with($data);
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
            "bname_k" => "required|unique:brands|max:255",
            "bname_e" => "max:255",
            "state" => "required",
        ]);

        Brand::create($validated);


        return redirect()->route("brand.index");
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
        $info = $this->BrandModel->info($id);

        $data = [
            "css" => $this->css,
            "m1" => $this->m1,
            "m2" => $this->m2,
            "row" => $info
        ];

        if(!$info) {
            return abort(404);
        } else {
            return view('brand.edit')->with($data);
        }
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
