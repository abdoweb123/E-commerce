<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;

class CoursesUserController 
{
     public function index(Request $request)
    {
        $segments = $request->segments();
    //   dd($segments[0]);
      $courses =  DB::table('courses')->get();

   
       return view('courses.index', compact('courses'));

    }
    
       public function show(Request $request, $id)
    {

        $course=DB::table('courses')
        ->select('*')
        ->where('id',$id)
        ->get();   
        // dd($course);
   
            return view('courses.show', compact('course'));

    }
}
