@extends('public.layout')



@push('meta')
    <meta name="title" content="courses">
    <meta name="description" content="courses">
    <meta name="twitter:card" content="summary">

@endpush

@section('content')





 <div class="container" style="padding:5rem 5rem">
        <div class="row">

@php 

if (strtoupper(locale()) == 'EN') {
    $lang='en';
   }else{
    $lang='ar';

   }

@endphp


 @foreach ($courses as $course)
            <div class="col-lg-4 col-md-6 col-md-12" style="margin-bottom:10px;">

<div class="card">
  <img class="card-img-top" src="images/{{ $course->image }}" alt="Card image cap" style="">
  <div class="card-body">
    <h5 class="card-title" style="height:130px">{{ $course->{'name_' . $lang} }}</h5>
    <!--<p class="card-text">{{ $course->body_en }}</p>-->
    
    @if (strtoupper(locale()) == 'EN') 

        <a class="btn btn-primary" href="{{ route('courses.show',$course->id) }}" style="position:absolute;bottom:1rem">More Details</a>
        @else
        <a class="btn btn-primary" href="{{ route('courses.show',$course->id) }}" style="position:absolute;bottom:1rem">معرفة المزيد</a>
         @endif

  </div>
</div>
</div>
 @endforeach


</div>
</div>
@endsection