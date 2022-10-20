<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use Image;
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = products::all();
        return response()->json($product);
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
        $validateData = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_description' => 'required',
            'product_Image' => 'required',
            'unit_price' => 'required',
            'available_quantity' => 'required',
        ]);

        $position = strpos($request->product_Image, ';');
        $sub = substr($request->product_Image, 0, $position);
        $ext = explode('/', $sub)[1];

        $name = time() . "." . $ext;
        $img = Image::make($request->product_Image)->resize(240, 200);
        $upload_path = 'product/images/';
        $image_url = $upload_path . $name;
        $img->save($image_url);

        $product = new products();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_Image =  $image_url;;
        $product->unit_price = $request->unit_price;
        $product->available_quantity = $request->available_quantity;
        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        return response()->json($product);
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
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['unit_price'] = $request->unit_price;
        $data['available_quantity'] = $request->available_quantity;
        $image = $request->newproduct_Image;
        $position = strpos($image, ';');
        $sub = substr($image, 0, $position);
        $ext = explode('/', $sub)[1];

        $name = time() . "." . $ext;
        $img = Image::make($image)->resize(240, 200);
        $upload_path = 'product/images/';
        $image_url = $upload_path . $name;
        $success = $img->save($image_url);

        if ($success) {
            $data['product_Image'] = $image_url;
            $img = DB::table('products')->where('product_id', $id)->first();
            $image_path = $img->product_image;
            $done = unlink($image_path);
            $user  = DB::table('products')->where('product_id', $id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('product_id', $id)->first();
        $product_Image = $product->product_image;
        unlink($product_Image);
        DB::table('products')->where('product_id', $id)->delete();
    }
}
