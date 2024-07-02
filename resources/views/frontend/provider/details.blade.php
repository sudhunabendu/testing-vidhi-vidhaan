@extends('frontend.provider.profile')

@section('provider_content')

<div class="col-xl-8">
    <div class="card mb-4">
        <div class="card-header">Account Details</div>
        <div class="card-body">
            <form action="{{route('provider.profile.update',$provider->id)}}" method="POST">
                @csrf
                <div class="row gx-3 mb-3">

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">First
                            name</label>
                        <input class="form-control" id="inputFirstName" name="first_name" type="text" placeholder="Enter your first name"
                            value="{{$provider->first_name}}">
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputLastName">Last
                            name</label>
                        <input class="form-control" id="inputLastName" name="last_name" type="text" placeholder="Enter your last name"
                            value="{{$provider->last_name}}">
                    </div>
                </div>


                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName">Email Address</label>
                        <input class="form-control" id="inputFirstName" name="email" type="text" placeholder="Enter your email"
                            value="{{$provider->email}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputPhone">Phone
                            number</label>
                        <input class="form-control" name="mobile_number" id="inputPhone" type="tel" placeholder="Enter your phone number"
                            value="{{$provider->mobile_number}}" readonly>
                    </div>
                </div>


                <div class="row gx-3 mb-3">
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputFirstName">Select Country</label>
                        <input class="form-control" id="inputFirstName" name="email" type="text" placeholder="Enter your email"
                            value="{{$provider->userDetails->id}}">
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputFirstName">Select State</label>
                        <input class="form-control" id="inputFirstName" name="email" type="text" placeholder="Enter your email"
                            value="{{$provider->userDetails->id}}">
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputFirstName">Select City</label>
                        <input class="form-control" id="inputFirstName" name="email" type="text" placeholder="Enter your email"
                            value="{{$provider->userDetails->id}}">
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputFirstName">Pin Code</label>
                        <input class="form-control" id="inputFirstName" name="text" value="{{$provider->userDetails->id}}" type="text" placeholder="Enter your pin code">
                    </div>
                </div>

                {{-- <div class="row gx-3 mb-3">

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputOrgName">Organization
                            name</label>
                        <input class="form-control" id="inputOrgName" type="text"
                            placeholder="Enter your organization name" value="Start Bootstrap">
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1" for="inputLocation">Location</label>
                        <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location"
                            value="San Francisco, CA">
                    </div>
                </div> --}}

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

@endsection