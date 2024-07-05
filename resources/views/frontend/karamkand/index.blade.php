@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start" style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
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

        <div class="row">
            @if (count($karmkands) > 0)
                @foreach ($karmkands as $karmkand)
                <div class="col-lg-4">
                    <div class="karamkand_box mt-0">
                        <a href="{{route('karamkand-details',$karmkand->slug)}}">
                            <img src="{{URL::asset('images/karmkand_images/'.$karmkand->images)}}">
                        </a>
                        <div class="karamkand_box_main_title">
                            <h3>{{ucwords($karmkand->name)}}</h3>
                            <h2>₹ {{$karmkand->price}}</h2>
                        </div>
                        <p>{{\Illuminate\Support\Str::limit($karmkand->description, 120, '...')}}</p>
                        <a href="{{route('karamkand-details',$karmkand->slug)}}" class="btn btn_line_dtl">View Details</a>
                    </div>
                </div>
                @endforeach

            @else
                
                <div class="karamkand_box mt-0">
                    <h3>No Karamkand Available</h3>
                    <p>Please check back later for more updates.</p>
                    <a href="{{route('home')}}" class="btn btn_line_dtl">Back to Home</a>
                </div>    
                    
            @endif


            {{-- <div class="karamkand_box ">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage2.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent
                    intentionnellement.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage3.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage4.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage5.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage1.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box ">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage2.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent
                    intentionnellement.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage3.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage4.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage5.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

            {{-- <div class="karamkand_box">
                <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}

        </div>
    </div>
</section>


@include('frontend.common.index')

@endsection