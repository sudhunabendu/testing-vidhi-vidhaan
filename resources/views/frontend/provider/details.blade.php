@extends('frontend.provider.profile')

@section('provider_content')

<div class="col-xl-8">
    <div class="card mb-4">
        <div class="card-header">Account Details</div>
        <div class="card-body">
            <form action="{{route('provider.profile.update',$provider->userDetails->id)}}" method="POST">
                @csrf
                <div class="row gx-3 mb-3">

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">First
                            name</label>
                        <input class="form-control" id="inputFirstName" name="first_name" type="text"
                            placeholder="Enter your first name" value="{{$provider->first_name}}">
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputLastName">Last
                            name</label>
                        <input class="form-control" id="inputLastName" name="last_name" type="text"
                            placeholder="Enter your last name" value="{{$provider->last_name}}">
                    </div>
                </div>


                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="email">Email Address</label>
                        <input class="form-control" id="inputFirstName" name="email" type="email"
                            placeholder="Enter your email" value="{{$provider->email}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputPhone">Phone
                            number</label>
                        <input class="form-control" name="mobile_number" id="inputPhone" type="tel"
                            placeholder="Enter your mobile number" value="{{$provider->mobile_number}}" readonly>
                    </div>
                </div>


                <div class="row gx-3 mb-3">
                    <div class="col-md-3">
                        <label class="small mb-1" for="country">Select Country</label>
                        <select name="country" id="country-dropdown"
                            class="form-control @error('country') is-invalid @enderror">
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}" {{ $data->id == $provider->userDetails->country_id ?
                                'selected' : '' }}>
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('country')
                        <small class="text-danger" data-error='country'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="state">Select State</label>
                        <select name="state" id="state-dropdown"
                            class="form-control @error('state') is-invalid @enderror">
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}" {{ $state->id == $provider->userDetails->state_id ?
                                'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                        </select>
                        @error('state')
                        <small class="text-danger" data-error='state'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputFirstName">Select City</label>
                        <select name="city" id="city-dropdown" class="form-control @error('city') is-invalid @enderror">
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ $city->id == $provider->userDetails->city_id ? 'selected'
                                : '' }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city')
                        <small class="text-danger" data-error='city'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputFirstName">Pin Code</label>
                        <input class="form-control @error('post_code') is-invalid @enderror" id="inputFirstName"
                            name="post_code" value="{{$provider->userDetails->post_code}}" type="text"
                            placeholder="Enter your post code">
                        @error('post_code')
                        <small class="text-danger" data-error='post_code'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="row gx-3 mb-3">
                    <div class="col-md-4">
                        <label class="small mb-1" for="inputFirstName">Date Of Birth</label>
                        <input class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
                            type="date" placeholder="Enter your Date Of Birth" value="{{$provider->userDetails->dob}}">
                        {{-- value="{{$provider->userDetails->dob}}"> --}}
                        @error('date_of_birth')
                        <small class="text-danger" data-error='date_of_birth'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="small mb-1" for="inputPhone">Education</label>
                        <input class="form-control @error('education') is-invalid @enderror" name="education" id="inputPhone" type="text"
                            placeholder="Enter your Education" value="{{$provider->userDetails->education}}">
                            @error('education')
                            <small class="text-danger" data-error='education'>{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="small mb-1" for="inputPhone">Experience</label>
                        <input class="form-control @error('experience') is-invalid @enderror" name="experience" type="text"
                            placeholder="Enter your Experience" value="{{$provider->userDetails->experience}}">
                            @error('experience')
                            <small class="text-danger" data-error='experience'>{{ $message }}</small>
                            @enderror
                    </div>
                </div>


                <div class="row gx-3 mb-3">

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputLocation">Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" name="price" id="inputLocation" type="text"
                            placeholder="Enter Price" value="{{$provider->userDetails->price}}">
                            @error('price')
                            <small class="text-danger" data-error='price'>{{ $message }}</small>
                            @enderror
                    </div>

                </div>

                <div class="row gx-3 mb-3">

                    <div class="col-md-12">
                        <label class="small mb-1" for="inputOrgName">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30"
                            rows="10">{{$provider->userDetails->description}}</textarea>
                            @error('description')
                            <small class="text-danger" data-error='description'>{{ $message }}</small>
                            @enderror
                    </div>
                </div>





                {{-- <div class="mb-3">
                    <label class="small mb-1" for="inputEmailAddress">Email
                        address</label>
                    <input class="form-control" name="email" id="inputEmailAddress" type="email"
                        placeholder="Enter your email address" value="{{$provider->email}}" readonly>
                </div> --}}

                <div class="row gx-3 mb-3">

                </div>

                <button class="btn page_btn_dark" type="submit">Save
                    changes</button>
            </form>
        </div>
    </div>
</div>

@section('provider_detailsJS')


<script>
    $(function() {
        $("[name='price']").on("focus", function() {
            $(this).numeric();
            $("[data-error='price']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='education']").on("focus", function() {
            $("[data-error='education']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='country']").on("focus", function() {
            $(this).numeric();
            $("[data-error='country']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='state']").on("focus", function() {
            $(this).numeric();
            $("[data-error='state']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='city']").on("focus", function() {
            $(this).numeric();
            $("[data-error='city']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='experience']").on("focus", function() {
            $(this).numeric();
            $("[data-error='experience']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='description']").on("focus", function() {
            // $(this).numeric();
            $("[data-error='description']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='date_of_birth']").on("focus", function() {
            // $(this).numeric();
            $("[data-error='date_of_birth']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='post_code']").on("focus", function() {
            $(this).numeric();
            $("[data-error='post_code']").html("");
            $(this).removeClass("is-invalid");
        });
     });
</script>


<script>
    $(document).ready(function () {
        $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                var path = "{{route('fetchState')}}"
                $("#state-dropdown").html('');
                $.ajax({
                    url: path,
                    // url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });


            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                var path1 = "{{route('fetchCity')}}"
                $("#city-dropdown").html('');
                $.ajax({
                    url: path1,
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
    })
</script>





@if(session('success'))
<script>
    //     Swal.fire({
//     title: "Success!",
//     text: "{{session('success')}}",
//     icon: "success",
//     showConfirmButton: false,
//     timer: 2500
//   });
toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{session('success')}}", null, 
        {
            timeOut: 5000,
            fadeOut: 1000,
            onHidden: function () {
            // window.location.reload();
        }
        });
</script>


@elseif(session('error'))
<script>
    //     Swal.fire({
//     icon: "error",
//     title: "Oops...",
//     text: "{{session('error')}}",
//     showConfirmButton: false,
//     timer: 2500
// });
toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.error("{{session('error')}}", null, 
    {
        timeOut: 5000,
        fadeOut: 1000,
        onHidden: function () {
        // window.location.reload();
    }
    });
</script>

@endif
@endsection

@endsection