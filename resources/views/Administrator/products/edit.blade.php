@extends('Administrator.master')

@section('content')

@section('title', 'Product | Management')


@section('editProduct')
{{-- <style>
    input[type="file"] {
        color: transparent;
    }
</style> --}}
@endsection

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
                    <form action="{{route('admin.update.products',$product->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Product Name" autocomplete="off" value="{{$product->name}}">
                                    @error('name')
                                    <small class="text-danger" data-error='name'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Enter Price" autocomplete="off" value="{{$product->price}}">
                                    @error('price')
                                    <small class="text-danger" data-error='price'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Product Description</label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror" rows="4"
                                    cols="50">{{trim($product->description)}}</textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
                            </div>



                            {{-- <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror" id="content"
                                    placeholder="Enter the Description" rows="5"></textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
                            </div> --}}


                            {{-- <div class="form-group">
                                <textarea id="summernote" name="description"
                                    class="form-control @error('description') is-invalid @enderror">
                                      </textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
                            </div> --}}




                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="image">Product Image : </label>
                                    <img src="{{URL::asset('images/product_images').'/'.$product->images}}" alt="" width="30%" height="50%">
                                    <label for="image">Choose data</label
                                    >
                                    <input type="file" name="images" value="{{old('images', $product->images)}}" class="form-control"
                                    />
                                    @error('images')
                                    <small class="text-danger" data-error='images'>{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- <div class="form-group col-md-6">
                                    <label for="">Product Image</label>
                                    <input type="file" name="images" title="your text"
                                        class="form-control @error('images') is-invalid @enderror"
                                        placeholder="Upload Product Image" value="{{$product->images}}">
                                    @error('images')
                                    <small class="text-danger" data-error='images'>{{ $message }}</small>
                                    @enderror
                                </div> --}}

                                {{-- <div class="form-group">
                                    <img src="{{URL::asset('images/product_images').'/'.$product->images}}" alt="#"
                                        width="50%" height="50%">
                                </div> --}}
                            </div>

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

@section('editProduct')
<script>
    $(function () {
     $('input[type="file"]').change(function () {
          if ($(this).val() != "") {
                 $(this).css('color', '#333');
          }else{
                 $(this).css('color', 'transparent');
          }
     });
})
</script>
@endsection

@endsection