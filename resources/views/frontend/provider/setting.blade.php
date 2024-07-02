@extends('frontend.provider.profile')

@section('provider_content')

<div class="col-xl-8">
    <div class="card mb-4">
        <div class="card-header">Service Details</div>
        <div class="card-body">
            <form action="{{route('provider.service')}}" method="POST">
                @csrf
                <div class="row gx-3 mb-3">

                    <div class="col-md-6">
                        <label class="small mb-1" for="name">Service
                            name <span style="color:red">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="inputFirstName"
                            type="text" placeholder="Enter service name">
                        @error('name')
                        <small class="text-danger" data-error='name'>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1" for="price">Service Price <span style="color:red">*</span></label>
                        <input class="form-control  @error('price') is-invalid @enderror" name="price"
                            id="inputLastName" type="text" placeholder="Enter price">
                        @error('price')
                        <small class="text-danger" data-error='price'>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="small mb-1" for="description">Description <span style="color:red">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id=""
                        cols="30" rows="10"></textarea>
                    @error('description')
                    <small class="text-danger" data-error='description'>{{ $message }}</small>
                    @enderror
                    {{-- <input class="form-control" id="inputEmailAddress" type="email"
                        placeholder="Enter your email address"> --}}
                </div>

                <button class="btn page_btn_dark" type="submit">Submit</button>
            </form>
        </div>


        <div class="card-body">
            <form action="{{route('provider.service.date.time')}}" method="POST">
                @csrf
                <div class="row gx-3 mb-3">

                    <div class="col-md-3">
                        <label class="small mb-1" for="inputOrgName">Select Service <span style="color:red">*</span></label>
                        {{-- <input class="form-control" id="inputOrgName" type="text"
                            placeholder="Enter your organization name" value="Start Bootstrap"> --}}
                        <select name="service" id="inputOrgName"
                            class="form-control @error('service') is-invalid @enderror">
                            <option value="">--Select--</option>
                            @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                        @error('service')
                        <small class="text-danger" data-error='service'>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="small mb-1" for="date">Date of Service <span style="color:red">*</span></label>
                        <input name="date" class="form-control @error('date') is-invalid @enderror" id="inputOrgName" type="date"
                            placeholder="Enter your organization name">
                            @error('date')
                            <small class="text-danger" data-error='date'>{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="small mb-1" for="start_time">Start Time <span style="color:red">*</span></label>
                        <input name="start_time" class="form-control @error('start_time') is-invalid @enderror" id="inputLocation" type="time" placeholder="Enter your location">
                            @error('start_time')
                            <small class="text-danger" data-error='start_time'>{{ $message }}</small>
                            @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="small mb-1" for="inputLocation">End Time <span style="color:red">*</span></label>
                        <input name="end_time" class="form-control @error('end_time') is-invalid @enderror" id="inputLocation" type="time" placeholder="Enter your location">
                            @error('end_time')
                            <small class="text-danger" data-error='end_time'>{{ $message }}</small>
                            @enderror
                    </div>
                </div>

                <button class="btn page_btn_dark" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@section('setting_astrologer')
<script type="text/javascript">
    $(function() {
        $("[name='name']").on("focus", function() {
            $("[data-error='name']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='price']").on("focus", function() {
            $(this).numeric();
            $("[data-error='price']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='description']").on("focus", function() {
            $("[data-error='description']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='service']").on("focus", function() {
            $("[data-error='service']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='date']").on("focus", function() {
            $("[data-error='date']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='start_time']").on("focus", function() {
            $("[data-error='start_time']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='end_time']").on("focus", function() {
            $("[data-error='end_time']").html("");
            $(this).removeClass("is-invalid");
        });
      
    });
    
</script>
@endsection

@endsection