@extends('public.layout')



@push('meta')
    <meta name="title" content="service">
    <meta name="description" content="$service">
    <meta name="twitter:card" content="summary">

@endpush

@section('content')


<style>
/*.section-title::before {*/
/*    position: absolute;*/
/*    content: "";*/
/*    width: 45px;*/
/*    height: 4px;*/
/*    bottom: 0;*/
/*    background: var(--dark);*/
/*     right:47.5%;*/

/*}*/

/*.section-title::after {*/
/*    position: absolute;*/
/*    content: "";*/
/*    width: 4px;*/
/*    height: 4px;*/
/*    bottom: 0;*/
/*    background: var(--dark);*/
/*    right:47.5%;*/
/*}*/

.service-item a.btn {
    position: relative;
    display: flex;
    color: var(--primary);
    transition: .5s;
    z-index: 1;
}

.service-item:hover a.btn {
    color: var(--primary);
}
.section-title.text-center::before {
    left: 50%;
    margin-left: -25px;
}

.section-title.text-center::after {
    left: 50%;
    margin-left: 25px;
}

/*.section-title h6::before,*/
/*.section-title h6::after {*/
/*    position: absolute;*/
/*    content: "";*/
/*    width: 10px;*/
/*    height: 10px;*/
/*    top: 2px;*/
/*    background: rgba(33, 66, 177, .5);*/
/*     right: 47.5%;*/
/*}*/

.section-title h6::after {
    top: 5px;
    left: 3px;
}


.service-item {
    position: relative;height: 350px;padding: 30px 25px;background: #FFFFFF;box-shadow: 0 0 45px rgba(0, 0, 0, .08);transition: .5s;
}

.service-item:hover {
    background: var(--primary);
}

.service-item .service-icon {
    margin: 0 auto 20px auto;
    width: 90px;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light);
    background: url(../img/icon-shape-primary.png) center center no-repeat;
    transition: .5s;
}

.service-item:hover .service-icon {
    color: var(--primary);
    background: url(../img/icon-shape-white.png);
}

.service-item h5,
.service-item p {
    transition: .5s;
}

.service-item:hover h5,
.service-item:hover p {
    color: var(--light);
}



.service-item a.btn::before {
    position: absolute;
    content: "";
    width: 35px;
    height: 35px;
    top: 0;
    left: 0;
    border-radius: 35px;
    background: #DDDDDD;
    transition: .5s;
    z-index: -1;
}

.service-item:hover a.btn::before {
    width: 100%;
    background: var(--light);
}

</style>


@php 

if (strtoupper(locale()) == 'EN') {
    $lang='en';
   }else{
    $lang='ar';

   }

@endphp
 <div class="container" style="padding:5rem 5rem">

        
        
          <div class="container-xxl py-5">
            <div class="container px-lg-5">
             @if (strtoupper(locale()) == 'EN') 

                <div class=" position-relative text-center  wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                    <h2 class="mt-2">What Solutions We Provide</h2>
                </div>
                @else
                  <div class=" position-relative text-center  wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">خدماتنا</h6>
                    <h2 class="mt-2">ما هي الحلول التي نقدمها</h2>
                </div>
                @endif
                <div class="row g-4">
                 @foreach ($services as $service)
                 
                    <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column text-center rounded" style="position: relative;height: 350px;padding: 30px 25px;background: #FFFFFF;box-shadow: 0 0 45px rgba(0, 0, 0, .08);transition: .5s;margin-top: 3rem;
">
                            
                              <img class="card-img-top" src="images/{{ $service->image }}" alt="Card image cap" style="height:10rem; width:auto">

                            <h5 class="mb-3" style="padding-top: 3rem;">{{ $service->{'name_' . $lang} }}</h5>
                           </div>
                         
@if (strtoupper(locale()) == 'EN') 

        <a class="btn btn-primary" href="{{ route('services.show',$service->id) }}" style="position:absolute;bottom:1rem;left: 7.5rem;">More Details</a>
        @else
        <a class="btn btn-primary" href="{{ route('services.show',$service->id) }}" style="position:absolute;bottom:1rem;left: 7.5rem;">معرفة المزيد</a>
         @endif                       
         </div>
                    
             @endforeach
    </div>
        
        
        </div>

        
        



</div>
</div>
@endsection