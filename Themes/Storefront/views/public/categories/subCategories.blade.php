@extends('public.layout')

@section('style')
    <style>
        .category-container{
            background-color: #80808012;
        }

        .category-nav{
            display: none !important;
        }

        .navigation-inner .navbar {
            margin: auto;
        }

        .category-card{
            border: none;
            background-color: white;
            border-radius: 10px;
            position: relative;
            height:215px;
            /*border: 1px solid #ddd;*/
        }

        .category-card:hover{
            box-shadow: none;
            z-index: 0;
        }
        .category-img{
            /*width: 100%;*/
            /*height: 100%;*/
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;

            /*width: 100%;*/
            /*height: 100%;*/
            /*object-fit: cover;*/
            /*transition: scale 0.5s cubic-bezier(0.46, 0.03, 0.52, 0.96) 0s;*/
        }
        .category-img:hover{
            -webkit-transform: scale(1.2);
            transform: scale(1.2,1.2);
            -ms-transform: scale(1.2,1.2); /* IE 9 */
            -webkit-transform: scale(1.2,1.2); /* Safari and Chrome */
        }

        .tab-content .slick-list , .category_title{
            margin: 0 50px;
        }


        * {
            box-sizing: border-box;
        }
        .show-grid {
            padding: 10px;
        }

        .show-grid .row {
            margin-bottom: 15px;
        }

        .show-grid [class^=col-] {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .category-details{
            position: absolute;
            /*top: 130px;*/
            left: 40px;
            color: white;

            height: 150px;
        }

        .explore-btn{
            display: none;
            border-radius: 5px;
        }

        .category-details h3{
            color: white !important;
        }


        .overlay-category {
            cursor: pointer;
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, rgb(0, 0, 0) 0%, rgb(4, 4, 4) 2%, rgba(255, 255, 255, 0) 50%);
            border-radius: inherit;
        }

        .categorises-banner-img{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 10px;
        }


        @media  (max-width: 399px){
            .category-details{
                top: 75px;
            }
        }

        @media (min-width: 400px) and (max-width: 449px){
            .category-details{
                top: 120px;
            }
        }

        @media (min-width: 450px) and (max-width: 768px){
            .category-details{
                top: 150px;
            }
        }


        @media (min-width: 769px) and (max-width: 799px){
            .category-details{
                top: 85px;
            }
        }


        @media (min-width: 769px) and (max-width: 799px){
            .category-details{
                top: 85px;
            }
        }


        @media (min-width: 800px) and (max-width: 850px){
            .category-details{
                top: 95px;
            }
        }

        @media (min-width: 851px) and (max-width: 933px){
            .category-details{
                top: 113px;
            }
        }

        @media (min-width: 934px) and (max-width: 934px) {
            .category-details{
                top: 120px;
            }
        }

        @media (min-width: 935px) and (max-width: 1089px){
            .category-details{
                top: 135px;
            }
        }

        @media (min-width: 1090px) and (max-width: 1999px){
            .category-details{
                top: 165px;
            }
        }

        @media (min-width: 1200px){
            .category-details{
                top: 110px;
            }

            .category-container .row{
              padding: 25px;
            }

        }

    </style>
@endsection

@section('title', setting('store_tagline'))

@section('content')

    <div class="container category-container show-grid">
        <h3 class="category_title text-center pt-3">
          <span style="color: #4b2424"> {{$main_category->name}} : </span>  Sub Categories
        </h3>
        <div class="row justify-content-center">
            @foreach($sub_categories as $sub_category)
                <div class="col-xl-6 col-md-8 col-sm-14 col-xs-18">
                    <a href="{{route('categories.products.index',$sub_category->slug)}}" class="category-image">
                        <div class="category-card" style="overflow: hidden; position: relative">

                            <?php
                                $select_entity = \Illuminate\Support\Facades\DB::table('entity_files')
                                    ->select('*')
                                    ->where('entity_id', $sub_category->id)
                                    ->where('entity_type', 'Modules\Category\Entities\Category')
                                    ->first();

                                if ($select_entity) {
                                    $file_id = $select_entity->file_id;

                                    $file = \Illuminate\Support\Facades\DB::table('files')
                                        ->select('*')
                                        ->where('id', $file_id)
                                        ->first();

                                    if ($file) {
                                        $category_image = $file->path;
                                    } else {
                                        // default image when the file is not found
                                        $category_image = 'media/default_image.jpg';
                                    }
                                } else {
                                    //  default image when the entity_file is not found
                                    $category_image = 'media/default_image.jpg';
                                }
                            ?>


                            <div class="categorises-banner-img">

                                @if (Storage::exists($category_image))
                                    <img src="{{url('/storage')}}/{{$category_image}}" alt="category image" class="category-img">
                                @else
                                    <img  src="{{asset('/images/default_image.jpg')}}" alt="category image" class="category-img">
                                @endif
                            </div>
                            <div class="overlay-category">

                            </div>
                            <div class="category-details mt-1">
                                <h3 class="category-name mb-1" style="">{{$sub_category->name}}</h3>
                                <button class="btn btn-primary explore-btn" style="">Explore</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


@endsection

@section('scripts')
    <script>

        // nav-items to be removed from Navbar
        var tags = ["Smart home" , "3D printer + CNC" , "Services"]

        for (var i=0;  i<tags.length; i++)
        {
            $("li a[data-text='" + tags[i] + "']").remove();
        }



        // Effects on Categories divs
        $('.overlay-category')
            .hover(function (){

            $(this).siblings('.categorises-banner-img').children('.category-img').css('transform', 'scale(1)');


            $('.explore-btn').hide()


            $(this).siblings('.category-details').children('.explore-btn').show();

        }).mousemove(function (){

            $(this).siblings('.categorises-banner-img').children('.category-img').css('transform', 'scale(1.2)');
        });

    </script>
@endsection
