@extends('Administrator.master')

@section('content')


@section('title', 'Gemstone | Management')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>General Form</h1> --}}
                <a href="{{route('admin.gemstones')}}" class="btn btn-info"><i class="fas fa-backward"></i> Back</a>
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
                    <form action="{{route('admin.store.gemstones')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Select Category<span style="color:red">*</span></label>

                                    <select name="category" class="form-control @error('category') is-invalid @enderror" id="">
                                        <option value="" selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Product Name" autocomplete="off"> --}}
                                    @error('category')
                                    <small class="text-danger" data-error='category'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Gemstone Name <span style="color:red">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Product Name" autocomplete="off">
                                    @error('name')
                                    <small class="text-danger" data-error='name'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="weight">Weight <span style="color:red">*</span></label>
                                    <input type="text" name="weight"
                                        class="form-control @error('weight') is-invalid @enderror"
                                        placeholder="Enter weight" id="weight" autocomplete="off">
                                    @error('weight')
                                    <small class="text-danger" data-error='weight'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price">Price <span style="color:red">*</span></label>
                                    <input type="text" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="Enter Price" id="price" autocomplete="off">
                                    @error('price')
                                    <small class="text-danger" data-error='price'>{{ $message }}</small>
                                    @enderror
                                </div>



                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="images">Gemstone Image <span style="color:red">*</span></label>
                                    <input type="file" name="images"
                                        class="form-control @error('images') is-invalid @enderror"
                                        placeholder="Upload Gemstone Image">
                                    @error('images')
                                    <small class="text-danger" data-error='images'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Gemstone Description <span style="color:red">*</span></label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror" rows="4"
                                    cols="50"></textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
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

@section('productAddJs')
{{-- <script>
    ClassicEditor.create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script> --}}
<script>
    $(function () {
      // Summernote
    //   $('#summernote').summernote()
  
      // CodeMirror
    //   CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    //     mode: "htmlmixed",
    //     theme: "monokai"
    //   });
    })
</script>

<script type="text/javascript">
    $(function() {
        $("[name='category']").on("focus", function() {
            $("[data-error='category']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='name']").on("focus", function() {
            $("[data-error='name']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='weight']").on("focus", function() {
            $(this).numeric();
            $("[data-error='weight']").html("");
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
      
    });
    
</script>
@endsection

@endsection