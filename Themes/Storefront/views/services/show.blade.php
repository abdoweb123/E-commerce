<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    body{
    background-color: #edf1f5;
    margin-top:20px;
}
.card {
    margin-bottom: 30px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
    max-width: 80%;
}
.card .card-subtitle {
    font-weight: 300;
    margin-bottom: 10px;
    color: #8898aa;
}
.table-product.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f3f8fa!important
}
.table-product td{
    border-top: 0px solid #dee2e6 !important;
    color: #728299!important;
}
</style>
@extends('public.layout')



@push('meta')
    <meta name="title" content="services">
    <meta name="description" content="services">
    <meta name="twitter:card" content="summary">

@endpush

@section('content')
@php 

if (strtoupper(locale()) == 'EN') {
    $lang='en';
   }else{
    $lang='ar';

   }

@endphp
        @if (strtoupper(locale()) == 'EN') 
 <div class="container" style="padding:5rem 5rem; margin-left:10%">

      @else
 <div class="container" style="padding:5rem 5rem;margin-right:10%">
      @endif
              <div class="row" >

           <div class="card">
        <div class="card-body">
            <h3 class="card-title" style="text-align: center;">{{ $service[0]->{'name_' . $lang} }}</h3>
            
              @if (strtoupper(locale()) == 'EN') 
            <h6 class="card-subtitle"style="text-align: center;">Here are more details about this service</h6>
            @else
            <h6 class="card-subtitle" style="text-align: center;">هنا يوجد تفاصيل أكثر عن الخدمة</h6>
             @endif
             
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="white-box text-center"><img src="images/{{ $service[0]->image }}" class="img-responsive" style="width:150%"></div>
                </div>
                               
                                </div> 
                </div> 

                <div style="max-width: 100%;margin: 3rem;">
                     @if (strtoupper(locale()) == 'EN') 

                    <h4 class="box-title">Service details</h4>
                    @else
                    <h4 class="box-title">تفاصيل الخدمة</h4>
                     @endif
                     <p>{!! $service[0]->{'body_' . $lang} !!}</p>
                   
                
                </div> 
            
            
</div>  

</div>
</div>
@endsection