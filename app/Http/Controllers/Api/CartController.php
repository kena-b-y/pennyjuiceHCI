<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
    	$product = DB::table('products')->where('product_id',$id)->first();

    	$check = DB::table('carts')->where('product_id',$id)->first();

    	if ($check) {
    	DB::table('carts')->where('product_id',$id)->increment('product_quantity');

       $product = DB::table('carts')->where('product_id',$id)->first();
  	   $subtotal = $product->product_quantity * $product->product_price;
  	   DB::table('carts')->where('product_id',$id)->update(['sub_total'=> $subtotal]);

    	}else{
    	$data = array();
    	$data['product_id'] = $id;
    	$data['product_name'] = $product->product_name;
		$data['product_image'] = $product->product_image;
    	$data['product_quantity'] = 1;
		$data['user_id'] = 1;
    	$data['product_price'] = $product->unit_price;
    	$data['sub_total'] = $product->unit_price;

    	DB::table('carts')->insert($data);
    	}

    }


  public function CartProduct(){
   $cart = DB::table('carts')->get();
  	return response()->json($cart);
  }



 public function removeCart($id){
 	DB::table('carts')->where('id',$id)->delete();
 	return response('Done');

 }


  public function increment($id){
  	$quantity = DB::table('carts')->where('id',$id)->increment('product_quantity');

  	$product = DB::table('carts')->where('id',$id)->first();
  	$subtotal = $product->product_quantity * $product->product_price;
  	DB::table('carts')->where('id',$id)->update(['sub_total'=> $subtotal]);
  	return response('Done');
  }


  public function decrement($id){
  	$quantity = DB::table('carts')->where('id',$id)->decrement('product_quantity');

  	$product = DB::table('carts')->where('id',$id)->first();
  	$subtotal = $product->product_quantity * $product->product_price;
  	DB::table('carts')->where('id',$id)->update(['sub_total'=> $subtotal]);
  	return response('Done');
  }
}
