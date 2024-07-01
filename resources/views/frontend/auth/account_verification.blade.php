@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('/frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Account Verification</h1>

            </div>
        </div>
    </div>
</div>

    <form action="" method="post">
        <input type="hidden" name="email" value="{{$userEmail}}">
        <input type="hidden" name="token" value="{{$userToken}}">
        {{-- <input type="submit" name="submit" value="submit"> --}}
    </form>

@endsection