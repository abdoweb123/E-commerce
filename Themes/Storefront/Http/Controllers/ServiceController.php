<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use DB;

class ServiceController 
{
    //
        public function index()
    {
        $services =  DB::table('services')->get();
    //  dd($services);
        return view('admin.storefront.services.index', compact('services'));
    }
    
     
    
          /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Book  $book
    * @return \Illuminate\Http\Response
    */

    public function edit(Request $request, $id)
    {

            $service = DB::table('services')
                ->where('id', $id)
                ->paginate(5);

        return view('admin.storefront.services.edit',compact('service'));

    }
    
        /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\User  $movie
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'body_ar' => 'required',
            'body_en' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add appropriate validation rules for images


        ]);
        $input = $request->all();

        $service = DB::table('services')->where('id', $id)->first();

        if ($service) {

     // Handle image upload if provided
            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = $profileImage;
            }

            // Update the $service details
            DB::table('services')
                ->where('id', $id)
                ->update([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'body_ar' => $request->input('body_ar'),
            'body_en' => $request->input('body_en'),
            'image' => $input['image'] ?? $service->image, // Use the new image if uploaded, otherwise use existing image
                ]);
}


        return redirect()->route('adminservices.index')->with('success','Service Has Been updated successfully');
    }
    
    
    
      public function destroy(Request $request,$id)
    {
        // dd($request);
       $service = DB::table('services')->where('id', $id)->delete();

        return redirect()->route('adminservices.index')->with('success','Service Has Been deleted successfully');
    }
}
