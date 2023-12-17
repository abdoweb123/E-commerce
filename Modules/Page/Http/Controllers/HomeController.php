<?php

namespace Modules\Page\Http\Controllers;

use Modules\Category\Entities\Category;

class HomeController
{
    public function index()
    {

        // Dinamic ip
//      $userIp = $_SERVER['REMOTE_ADDR'];

        //static ip
//        $userIp = '101.44.112.0'; //from saudi arabia
//
//        $response = Http::get("https://api.iplocation.net/?cmd=ip-country&ip={$userIp}");
//
//        // Data Location
//        $data = $response->object();
//
//        $countryCode = $data->country_code2;
//
//
//        // get all categories which has products which has countries in which is equal to visitor's country
//        $categories = DB::table('categories')
//            ->select('categories.*')
//            ->join('product_categories', 'categories.id', '=', 'product_categories.category_id')
//            ->join('products', 'product_categories.product_id', '=', 'products.id')
//            ->join('product_countries', 'products.id', '=', 'product_countries.product_id')
//            ->join('countries', 'product_countries.country_id', '=', 'countries.id')
//            ->where('countries.iso', $countryCode)
//            ->where('categories.is_active', 1)
//            ->where('products.is_active', 1)
//            ->distinct()
//            ->get();
//
//        // This step is to get Category Model Attributes
//        $categories_ids = $categories->pluck('id')->toArray();
//        for ($i=0; $i<count($categories_ids); $i++)
//        {
//            $categories = Category::query()->whereIn('id',$categories_ids)->get();
//        }

//        return $categories;

        $categories = Category::all();

        return view('public.home.index', compact('categories'));
    }


} //end of class
