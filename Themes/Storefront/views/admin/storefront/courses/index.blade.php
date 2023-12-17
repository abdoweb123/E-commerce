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
<div class="btn-group pull-right">
                    <a href="{{ route('admincreatecourses.index') }}" class="btn btn-primary">Create new course</a>
                </div>
                
 @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                
                
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">id </th>
                                <th class="column-title">image </th>
                                <th class="column-title">name in Arabic </th>
                                <th class="column-title">name in English </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)

                            <tr class="even pointer">
                                <td class=" ">{{ $course->id }}</td>
                                 <td class=" "><img src="images/{{ $course->image }}" alt="" style="width: 40px;height:60px;"></td>
                                 <td class=" ">{{ $course->name_ar }}</td>
                                 <td class=" ">{{ $course->name_en }}</td>
                                 
                                 <form action="{{ route('admincourses.destroy',$course->id) }}" method="Post">
                                
                            <td class=" last"><a class="btn btn-success" href="{{ route('admincourses.edit',$course->id) }}"><i class="fa fa-pencil"></i>Edit</a>
                            </td>
                            @csrf
                            @method('DELETE')
                            <td class=" last"><a href="#">
                              <!--<a href="#myModal" class="trigger-btn" data-toggle="modal">-->
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                  <!--</a>-->
                            </a>
                            </td>
                          </form>

                            </tr>
    <!--                          <div id="myModal" class="modal fade">-->
    <!--  <div class="modal-dialog modal-confirm">-->
    <!--    <div class="modal-content">-->
    <!--      <div class="modal-header flex-column">-->
    <!--        <div class="icon-box">-->
    <!--          <i class="material-icons">&#xE5CD;</i>-->
    <!--        </div>						-->
    <!--        <h4 class="modal-title w-100">Are you sure?</h4>	-->
    <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
    <!--      </div>-->
    <!--      <div class="modal-body">-->
    <!--        <p>Do you really want to delete these records? This process cannot be undone.</p>-->
    <!--      </div>-->
    <!--      <div class="modal-footer justify-content-center">-->
    <!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>-->
    <!--        <form action="{{ route('admincourses.destroy',$course->id) }}" method="Post">-->
    <!--          @csrf-->
    <!--          @method('DELETE')-->

    <!--        <button type="submit" class="btn btn-danger" >Delete</button>-->
    <!--        </form>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>  -->
   
                            @endforeach
                        </tbody>
                      </table>
                    </div>
 
@endsection