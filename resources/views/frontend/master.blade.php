<!DOCTYPE html>
<html lang="en">

<head>
  <title>Vidhi Vidhaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @include('frontend.Layouts.cssLink')

</head>

<body>

  <audio loop autoplay>
    <source src="{{URL::asset('frontend/assets/audio/puja.mp3')}}" type="audio/mpeg">
  </audio>
  {{-- @include('frontend.audio.index') --}}

  @include('frontend.Layouts.header')

  @yield('content')

  @include('frontend.Layouts.footer')

  @include('frontend.Layouts.jsLink')

</html>