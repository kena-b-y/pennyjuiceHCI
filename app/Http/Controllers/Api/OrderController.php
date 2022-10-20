<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use DB;
use Stripe;



class OrderController extends Controller
{
    public function OrderDone(Request $request)
    {

        $validatedData = $request->validate([
            'card_name' => 'required',
            'cvv' => 'required',
            'card_no' => 'required',
            'expirationMonth' => 'required',
            'expirationYear' => 'required',
        ]);

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_amount'] = $request->order_amount;
        $data['order_status'] = 'Processing';
        $data['center_name'] = $request->center_name;
        $data['contact_phone_no'] = $request->contact_phone_no;
        // $data['date_of_order'] = date('d/m/Y');
        $data['contact_name'] = $request->contact_name;
        $data['contact_email'] = $request->contact_email;
        $data['delivery_address'] = $request->delivery_address;

        $customer_id = $request->customer_id;
        $card_name = $request->card_name;
        $card_no = $request->card_no;
        $cvv = $request->cvv;
        $expirationMonth = $request->expirationMonth;
        $expirationYear = $request->expirationYear;
        $amount = $request->order_amount;


        // Process payment.

        $stripe = Stripe::make(env('STRIPE_KEY'));


        $token = $stripe->tokens()->create(
            [
                'card' => [
                    'number' => $card_no,
                    'exp_month' => $expirationMonth,
                    'exp_year' => $expirationYear,
                    'cvc' => $cvv,
                ]
            ]
        );

        if (!$token['id']) {
            session()->flush('error', 'Stripe Token generation failed');
            return;
        }

        // Create a customer stripe.

        $customer = $stripe->customers()->create([
            'name' => $card_name,
            'source' => $token['id'],
        ]);

        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'USD',
            'amount' => $amount,
            'description' => 'Payment for order',
        ]);

        if ($charge['status'] == "succeeded") {
            // Capture the details from stripe.

            $customerIdStripe = $charge['id'];
            $amountRec = $charge['amount'];

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = DB::table('carts')->get();
        $odata = array();
        foreach ($contents as $content) {
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->product_id;
            $odata['order_quantity'] = $content->product_quantity;
            $odata['product_price'] = $content->product_price;
            $odata['orderdetails_total'] = $content->sub_total;
            DB::table('orderdetails')->insert($odata);


            DB::table('products')
                ->where('product_id', $content->product_id)
                ->update(['available_quantity' => DB::raw('available_quantity -' . $content->product_quantity)]);
        }
            if ($order_id) {
                // Clear the cart after payment success.

                DB::table('carts')->delete();
                return response('Done');
        
            }
        } else {
            return ['error' => 'Order failed contact support'];
        }
    }

    public function TodayOrder()
    {

        $order = DB::table('orders')
            ->join('users', 'orders.customer_id', 'users.id')
            ->select('users.name', 'orders.*')
            ->orderBy('orders.order_id', 'DESC')->get();
        return response()->json($order);
    }


    public function OrderDetails($id)
    {
        //return response()->json($id);
        $order = DB::table('orders')
            ->join('users', 'orders.customer_id', 'users.id')
            ->where('orders.order_id', $id)
            ->select('orders.*', "users.*")
            ->first();
        return response()->json($order);
    }


    public function OrderDetailsAll($id)
    {

        $details = DB::table('orderdetails')
            ->join('products', 'orderdetails.product_id', 'products.product_id')
            ->where('orderdetails.order_id', $id)
            ->select('products.product_name', 'products.product_image', 'orderdetails.*')
            ->get();
        return response()->json($details);
    }

    public function show($id)
    {
        $order = DB::table('orders')->where('order_id', $id)->first();
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['center_name'] = $request->center_name;
        $data['contact_name'] = $request->contact_name;
        $data['contact_email'] = $request->contact_email;
        $data['delivery_address'] = $request->delivery_address;
        $data['contact_phone_no'] = $request->contact_phone_no;
        $data['order_status'] = $request->order_status;

        $user = DB::table('orders')->where('order_id', $id)->update($data);
    }

    public function UserOrders(){
        $user_id = '16';
        $userorder = DB::table('orders')->where('customer_id',$user_id)->get();;
        return response()->json($userorder);
    }

    public function GetOrder($id){

        $order = DB::table('orders')
            ->where('customer_id',$id)
            ->get();
            return response()->json($order);
 
    } 
 
      
   
}
