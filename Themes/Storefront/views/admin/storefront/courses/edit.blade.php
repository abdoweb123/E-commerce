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
            <h2>UPDATE THIS COURSE <small>with all details</small></h2>
           
            <div class="clearfix"></div>
        </div>
                
 @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
           
                
                <form class="form-horizontal form-label-left" action="{{route('admincourses.update',$course[0]->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">Course's name in Arabic</label>
                <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" placeholder="Course name in Arabic" name="name_ar" 
                            value="{{ $course[0]->name_ar }}">
                        </div>
                    </div>
                    @error('name_ar')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                
                
                
                  <div class="form-group row ">
                <label class="control-label col-md-3 col-sm-3 ">Course's name in English</label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" class="form-control" placeholder="Course's name in Arabic" name="name_en" value="{{ $course[0]->name_en }}">
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
                    rows='10' cols='10' labelCol='2'>{{ $course[0]->body_ar }}</textarea></div>
                </div>
                 </div>




                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Course body in English</label>

                    <span class="m-l-5 text-red">*</span>
                    <div class='col-md-9'>
                    <textarea
                    name='body_en'
                    class='form-control  wysiwyg'
                    id='body_ar'
                    rows='10' cols='10' labelCol='2' >{{ $course[0]->body_en }}</textarea></div>
                </div>

            
            
            
            
            
										<div class="form-group row ">
											<label class="control-label col-md-3 col-sm-3 ">Image</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="file" name="image" value="{{ $course[0]->image }}" id="image"> <label for="fileupload"> Select a file to upload</label> <br>
									</div>
									<img src="images/{{ $course[0]->image }}" style="width:20%;height:30vh;margin-left:13vw">
										</div>
										@error('image')
										<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
										@enderror
										
										
										
											<div class="ln_solid"></div>
										<div class="form-group" style="margin-bottom:15rem;margin-left:12rem">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="submit" name="submit" class="btn btn-primary">Edit</button>
											</div>
										</div>
										
										
										
										


                </form>
  </div>
                    </div>



@endsection