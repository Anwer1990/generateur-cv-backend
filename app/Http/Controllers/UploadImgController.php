<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImgController extends Controller
{
    public function index()
    {
        return view("uploadview");
    }
     /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . $request->image->getClientOriginalName();  
   
        $request->image->move(public_path('images'), $imageName);

        $avatar = "http://127.0.0.1:8000/images/".$imageName;
        return $avatar;
   
    }
}
