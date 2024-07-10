@extends('Administrator.master')

@section('content')


@section('title', 'Testimonial | Management')

@section('TestimonialAdded')
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
@endsection

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>General Form</h1> --}}
                <a href="{{route('admin.testimonials')}}" class="btn btn-info"><i class="fas fa-backward"></i>  Back</a>
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
                    <form action="{{route('admin.store.testimonials')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name <span style="color:red">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Testimonial name" autocomplete="off">
                                    @error('name')
                                    <small class="text-danger" data-error='name'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="role">Role <span style="color:red">*</span></label>
                                    <input type="text" name="role"
                                        class="form-control @error('role') is-invalid @enderror"
                                        placeholder="Enter Testimonial role" autocomplete="off">
                                    @error('role')
                                    <small class="text-danger" data-error='role'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description<span style="color:red">*</span></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" cols="50"></textarea>
                                @error('description')
                                <small class="text-danger" data-error='description'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Testimonial Image <span style="color:red">*</span></label>
                                    <input type="file" name="images"
                                        class="form-control @error('images') is-invalid @enderror"
                                        placeholder="Upload Testimonial Image">
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

@section('testimonialsAddJs')
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
        $("[name='name']").on("focus", function() {
            $("[data-error='name']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='role']").on("focus", function() {
            $("[data-error='role']").html("");
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