@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Karamkand</h1>

            </div>
        </div>
    </div>

</div>


<section class="karamkand_wrap">
    <div class="container">
        <img class="star_right" src="{{URL::asset('frontend/assets/images/star.png')}}">
        <img class="star_starlefttop" src="{{URL::asset('frontend/assets/images/star.png')}}">
        <img class="star_starleftdown" src="{{URL::asset('frontend/assets/images/star.png')}}">

        <div class="karamkand_box_main_wrap">
            @if (count($karmkands) > 0)
            @foreach ($karmkands as $karmkand)
            <div class="karamkand_box mt-0">
                <a href="{{route('karamkand-details',$karmkand->name)}}">
                <img src="{{URL::asset('images/karmkand_images/'.$karmkand->images)}}">
                </a>
                <div class="karamkand_box_main_title">
                    <h3>{{ucwords($karmkand->name)}}</h3>
                    <h2>₹ {{$karmkand->price}}</h2>
                </div>
                <p>{{\Illuminate\Support\Str::limit($karmkand->description, 120, '...')}}</p>
                <a href="{{route('karamkand-details',$karmkand->name)}}" class="btn btn_line_dtl">View Details</a>
            </div>
            @endforeach
            @endif


        </div>
    </div>
</section>


@include('frontend.common.index')

@endsection