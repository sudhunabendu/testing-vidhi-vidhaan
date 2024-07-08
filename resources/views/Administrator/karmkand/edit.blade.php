@extends('Administrator.master')

@section('content')

@section('title', 'Karmkand | Management')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>General Form</h1> --}}
                <a href="{{route('admin.karmkands')}}" class="btn btn-info"><i class="fas fa-backward"></i>  Back</a>
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
                    <form action="{{route('admin.update.karmkands',$karmkand->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="name">Select Category<span style="color:red">*</span></label>

                                    <select name="category" class="form-control @error('category') is-invalid @enderror" id="" disabled readonly>
                                        <option value="" selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $karmkand->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <small class="text-danger" data-error='category'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Karmkand Name <span style="color:red">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Karmkand Name" value="{{$karmkand->name}}" autocomplete="off">
                                    @error('name')
                                    <small class="text-danger" data-error='name'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Price <span style="color:red">*</span></label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Enter Price" id="price" value="{{$karmkand->price}}" autocomplete="off">
                                    @error('price')
                                    <small class="text-danger" data-error='price'>{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Karmkand Description <span style="color:red">*</span></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" cols="50">{{trim($karmkand->description)}}</textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">Karmkand Image : </label>
                                    <img src="{{URL::asset('images/karmkand_images').'/'.$karmkand->images}}" alt="" width="30%" height="50%">
                                    <label for="image">Choose data</label
                                    >
                                    <input type="file" name="images" value="{{$karmkand->images}}" class="form-control"
                                    />
                                    @error('images')
                                    <small class="text-danger" data-error='images'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="hidden" name="slug"
                                class="form-control"
                                placeholder="Enter slug" id="slug" value="{{$karmkand->slug}}" autocomplete="off">
                            </div>


                            {{-- <div class="form-group">
                                <label>Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images" class="custom-file-input @error('images') is-invalid @enderror">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                   
                                </div>
                                @error('images')
                                <small class="text-danger" data-error='images'>{{ $message }}</small>
                                @enderror
                            </div> --}}

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@section('karmkandJs')
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

        $("[name='category']").on("focus", function() {
            $("[data-error='category']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='images']").on("focus", function() {
            $("[data-error='images']").html("");
            $(this).removeClass("is-invalid");
        });
      
    });
    
</script>
@endsection


@endsection