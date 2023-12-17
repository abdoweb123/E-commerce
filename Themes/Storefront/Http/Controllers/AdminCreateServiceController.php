<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminCreateServiceController 
{
    //
     public function index()
    {
     
        return view('admin.storefront.services.create');
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'body_ar' => 'required',
            'body_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048'

        ]);

        $input = $request->all();
         $input = request()->except('_token','submit'); // Exclude the _token field

 if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
            //  dd($input['image']);

        // print_r($input);


        DB::table('services')->insert($input);

        return redirect()->route('adminservices.index')
            ->with('success', 'Service created successfully.');
    }
}
