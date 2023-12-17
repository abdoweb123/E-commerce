<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use DB;

class ServicesUserController
{
    //
      public function index(Request $request)
    {
        $segments = $request->segments();
    //   dd($segments[0]);
      $services =  DB::table('services')->get();

    
       return view('services.index', compact('services'));

    }
    
        public function show(Request $request, $id)
    {

        $service=DB::table('services')
        ->select('*')
        ->where('id',$id)
        ->get();   
        // dd($course);
  
            return view('services.show', compact('service'));


    }
}
