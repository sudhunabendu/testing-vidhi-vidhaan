@extends('Administrator.master')

@section('content')

@section('title', 'Service | Management')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>General Form</h1> --}}
                <a href="{{route('admin.products')}}" class="btn btn-info">Back</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">General Form</li> --}}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="ttt-toast">
    @include('Administrator.Layouts.notify')
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div> --}}

                    <!-- form start -->
                    <form action="{{route('admin.slot-bookings-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Service Name<span style="color:red">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Product Name" autocomplete="off">
                                    @error('name')
                                    <small class="text-danger" data-error='name'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Price">Price<span style="color:red">*</span></label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Enter price" autocomplete="off">
                                    @error('price')
                                    <small class="text-danger" data-error='price'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Product Description">Product Description<span style="color:red">*</span></label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror" rows="4"
                                    cols="50"></textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Product Image">Product Image<span style="color:red">*</span></label>
                                    <input type="file" name="images"
                                        class="form-control @error('images') is-invalid @enderror"
                                        placeholder="Upload Product Image">
                                    @error('images')
                                    <small class="text-danger" data-error='images'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Date Of Service">Day Of Service<span style="color:red">*</span></label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') is-invalid @enderror"
                                        placeholder="Enter Date" id="txtDate" autocomplete="off">
                                    @error('date')
                                    <small class="text-danger" data-error='date'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="start_time">Start Time<span style="color:red">*</span></label>
                                    <input type="time" name="start_time" id="start_time"
                                        class="form-control @error('start_time') is-invalid @enderror"
                                        placeholder="Enter Start Time" autocomplete="off">
                                    @error('start_time')
                                    <small class="text-danger" data-error='start_time'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="end_time">End Time<span style="color:red">*</span></label>
                                    <input type="time" name="end_time"
                                        class="form-control @error('end_time') is-invalid @enderror"
                                        placeholder="Enter End Time" autocomplete="off">
                                    @error('end_time')
                                    <small class="text-danger" data-error='end_time'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@section('servicesJs')


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

        $("[name='images']").on("focus", function() {
            $("[data-error='images']").html("");
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

<script>
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    // alert(maxDate);
    $('#txtDate').attr('min', maxDate);
});
</script>
@endsection

@endsection