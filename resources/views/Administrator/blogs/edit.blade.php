@extends('Administrator.master')

@section('content')


@section('title', 'Blog | Management')

@section('BlogAdded')
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
@endsection

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>General Form</h1> --}}
                <a href="{{route('admin.blogs')}}" class="btn btn-info"><i class="fas fa-backward"></i>  Back</a>
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
                    <form action="{{route('admin.update.blogs',$blogs->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">Blog Title <span style="color:red">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter Product title" autocomplete="off" value="{{$blogs->title}}">
                                    @error('title')
                                    <small class="text-danger" data-error='title'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="content">Content<span style="color:red">*</span></label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="4" cols="50">{{$blogs->content}}</textarea>
                                @error('content')
                                <small class="text-danger" data-error='content'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Blog Image <span style="color:red">*</span></label>
                                    <img src="{{URL::asset('images/blog_images').'/'.$blogs->images}}" alt="" width="30%" height="50%">
                                    <input type="file" name="images"
                                        class="form-control @error('images') is-invalid @enderror"
                                        placeholder="Upload Product Image" value="{{$blogs->images}}">
                                    @error('images')
                                    <small class="text-danger" data-error='images'>{{ $message }}</small>
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
        $("[name='title']").on("focus", function() {
            $("[data-error='title']").html("");
            $(this).removeClass("is-invalid");
        });

        
        $("[name='content']").on("focus", function() {
            $("[data-error='content']").html("");
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