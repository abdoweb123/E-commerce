@extends('admin::layout')

@section('title', trans('storefront::storefront.storefront'))

@section('content_header')
    <h3>{{ trans('storefront::storefront.storefront') }}</h3>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}">{{ trans('admin::dashboard.dashboard') }}</a></li>
        <li class="active">{{ trans('storefront::storefront.storefront') }}</li>
    </ol>
@endsection

@section('content')

<div class="col-md-6 " style="margin-left: 30%">
    <div class="x_panel">
        <div class="x_title">
            <h2>ADD NEW COURSE <small>with all details</small></h2>
           
            <div class="clearfix"></div>
        </div>


        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

        <form class="form-horizontal form-label-left" action="{{route('admincreateservices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">Course's name in Arabic</label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" class="form-control" placeholder="Course's name in Arabic" name="name_ar">
                </div>
            </div>
            @error('name_ar')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror


            <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">Course's name in English</label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" class="form-control" placeholder="Course's name in English" name="name_en">
                </div>
            </div>
            @error('name_ar')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror


     
              
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Course body in Arabic</label>

                    <span class="m-l-5 text-red">*</span>
                    <div class='col-md-9'>
                    <textarea
                    name='body_ar'
                    class='form-control  wysiwyg'
                    id='body_ar'
                    rows='10' cols='10' labelCol='2' ></textarea></div>
                </div>


                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Course body in English</label>

                    <span class="m-l-5 text-red">*</span>
                    <div class='col-md-9'>
                    <textarea
                    name='body_en'
                    class='form-control  wysiwyg'
                    id='body_ar'
                    rows='10' cols='10' labelCol='2' ></textarea></div>
                </div>


                
										<div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Image</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="file" name="image" value="fileupload" id="fileupload"> <label for="fileupload"> Select a file to upload</label> <br>
									</div>
										</div>
										@error('image')
										<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
										@enderror

                

                                      
										<div class="form-group" style="margin-bottom: 10rem;margin-left:12rem">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="submit" name="submit" class="btn btn-primary">Add</button>
											</div>
										</div>
        </form>

@endsection