<?php

namespace Modules\Category\Http\Controllers;

use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Controllers\ProductSearch;

class CategoryProductController
{
    use ProductSearch;

    /*** get a;; categories ***/
    public function index($slug, Product $model, ProductFilter $productFilter)
    {
        request()->merge(['category' => $slug]);

        if (request()->expectsJson()) {
            return $this->searchProducts($model, $productFilter);
        }

        $category = Category::findBySlug($slug);


        // To check if this category has sub-categories
        $sub_categories = Category::where('parent_id',$category->id)->get();
        if (sizeof($sub_categories)){
            return view('public.categories.subCategories', [
                'sub_categories' => $sub_categories,
                'main_category' => $category,
            ]);
        }
        else{

            return view('public.products.index', [
                'categoryName' => $category->name,
                'categoryBanner' => $category->banner->path,
            ]);
        }

    }



    public function getSubCategory($category_id){

         $category = Category::query()->findOrFail($category_id);

         $sub_categories = Category::where('parent_id',$category_id)->get();

         if (sizeof($sub_categories)){
             return view('public.categories.subCategories', [
                 'sub_categories' => $sub_categories,
                 'main_category' => $category,
             ]);
         }

         return redirect()->route('categories.products.index',$category->slug);
    }


}//end of class
