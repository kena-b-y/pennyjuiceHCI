<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\userdetails;
use Image;
use DB;

class UserdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdetail = DB::table('userdetails')
        ->join('roles','userdetails.role','roles.role_id')
        ->select('roles.role_name','userdetails.*')
        ->orderBy('userdetails.userdetails_id','DESC')
        ->get();
        return response()->json($userdetail);

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
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',


        ]);

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];
   
            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'user/images/';
            $image_url = $upload_path.$name;
            $img->save($image_url);
   
            $userdetail = new userdetails;
            $userdetail->first_name = $request->first_name;
            $userdetail->last_name = $request->last_name;
            $userdetail->name = $request->name;
            $userdetail->email = $request->email;
            $userdetail->password = Hash::make($request->password);
            $userdetail->phone_no = $request->phone_no;
            $userdetail->address = $request->address;
            $userdetail->photo = $image_url;
            $userdetail->role = $request->role;
            $userdetail->save(); 

        }else{
            $userdetail = new userdetails;
            $userdetail->first_name = $request->first_name;
            $userdetail->last_name = $request->last_name;
            $userdetail->name = $request->name;
            $userdetail->email = $request->email;
            $userdetail->password = Hash::make($request->password);
            $userdetail->phone_no = $request->phone_no;
            $userdetail->address = $request->address;
            $userdetail->role = $request->role;
            $userdetail->save(); 
        } 
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userdetail = DB::table('userdetails')->where('userdetails_id',$id)->first();
        return response()->json($userdetail);
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
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone_no'] = $request->phone_no;
        $data['address'] = $request->address;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $data['address'] = $request->address;
        $image = $request->newphoto;

        if ($image) {
         $position = strpos($image, ';');
         $sub = substr($image, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($image)->resize(240,200);
         $upload_path = 'user/images/';
         $image_url = $upload_path.$name;
         $success = $img->save($image_url);
         
         if ($success) {
            $data['photo'] = $image_url;
            $img = DB::table('userdetails')->where('userdetails_id',$id)->first();
            $image_path = $img->photo;
            $done = unlink($image_path);
            $user  = DB::table('userdetails')->where('userdetails_id',$id)->update($data);
         }
          
        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('userdetails')->where('userdetails_id',$id)->update($data);
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
        $userdetail = DB::table('userdetails')->where('userdetails_id',$id)->first();
        $photo = $userdetail->photo;
        if ($photo) {
          unlink($photo);
          DB::table('userdetails')->where('userdetails_id',$id)->delete();
        }else{
         DB::table('userdetails')->where('userdetails_id',$id)->delete();
        }
     }
}
