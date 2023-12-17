<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;

class CourseController 
{
     public function index()
    {
        $courses =  DB::table('courses')->get();
    //  dd($courses);
        return view('admin.storefront.courses.index', compact('courses'));
    }
    
    
    
    
          /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Book  $book
    * @return \Illuminate\Http\Response
    */

    public function edit(Request $request, $id)
    {

        // $course = DB::table('courses')->find($id)->where('id',$request->id)->paginate(5);
            $course = DB::table('courses')
                ->where('id', $id)
                ->paginate(5);

        return view('admin.storefront.courses.edit',compact('course'));

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

        // Get the course by ID
        $course = DB::table('courses')->where('id', $id)->first();

        if ($course) {

     // Handle image upload if provided
            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = $profileImage;
            }

            // Update the course details
            DB::table('courses')
                ->where('id', $id)
                ->update([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'body_ar' => $request->input('body_ar'),
            'body_en' => $request->input('body_en'),
            'image' => $input['image'] ?? $course->image, // Use the new image if uploaded, otherwise use existing image
                ]);
}


        return redirect()->route('admincourses.index')->with('success','Course Has Been updated successfully');
    }
    
    
    
      public function destroy(Request $request,$id)
    {
        // dd($request);
       $course = DB::table('courses')->where('id', $id)->delete();

        return redirect()->route('admincourses.index')->with('success','Course Has Been deleted successfully');
    }
}
