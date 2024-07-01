@extends('Administrator.master')

@section('content')

@section('title', 'Category | Management')


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Parent Category</h1> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
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

            {{--add new sub category section--}}

            <div class="col-md-12">
                <div class="card card-primary">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Category</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.update.categories',$categories->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">   

                                <input type="hidden" value="{{$categories->id}}" name="parent_category">

                                <div class="form-group col-md-6">
                                    <label for="parent_category">Select Category<span style="color:red">*</span></label>
                                        <select name="parent_category" id="parent_category" class="form-control @error('parent_category') is-invalid @enderror" disabled readonly>
                                            <option value="">Select Category</option>
                                            @if($category)
                                            @foreach ($category as $item)
                                            {{-- <?php $dash=''; ?> --}}
                                                <option value="{{$item->id}}" {{$item->id == $categories->parent_id ? 'selected' : ''}}>{{ucfirst($item->name)}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('parent_category')
                                        <small class="text-danger" data-error='parent_category'>{{ $message }}</small>
                                        @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sub_category_name">Sub Category Name <span style="color:red">*</span></label>
                                    <input type="text" name="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror"
                                        placeholder="Enter Sub Category Name" value="{{$categories->name}}">
                                        @error('sub_category_name')
                                        <small class="text-danger" data-error='sub_category_name'>{{ $message }}</small>
                                        @enderror
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label for="">Sub Category Description <span style="color:red">*</span></label>
                                <textarea name="sub_description" class="form-control @error('sub_description') is-invalid @enderror" rows="4" cols="50">{{$categories->description}}</textarea>
                                @error('sub_description')
                                <small class="text-danger" data-error='sub_description'>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="sub_images">Category Image: <span style="color:red">*</span></label>
                                    <img src="{{URL::asset('images/category_images').'/'.$categories->images}}" alt="" width="30%" height="50%">
                                    <input type="file" name="sub_images" value="{{old('images', $categories->images)}}"
                                        class="form-control @error('sub_images') is-invalid @enderror"
                                        placeholder="Upload Category Image">
                                    @error('sub_images')
                                    <small class="text-danger" data-error='sub_images'>{{ $message }}</small>
                                    @enderror
                                </div>
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

@section('addcategoryJS')
<script type="text/javascript">
    $(function() {
        $("[name='name']").on("focus", function() {
            $("[data-error='name']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='images']").on("focus", function() {
            $("[data-error='images']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='description']").on("focus", function() {
            $("[data-error='description']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='parent_category']").on("focus", function() {
            $("[data-error='parent_category']").html("");
            $(this).removeClass("is-invalid");
        });      
        $("[name='sub_category_name']").on("focus", function() {
            $("[data-error='sub_category_name']").html("");
            $(this).removeClass("is-invalid");
        });    

        $("[name='sub_description']").on("focus", function() {
            $("[data-error='sub_description']").html("");
            $(this).removeClass("is-invalid");
        });      
        $("[name='sub_images']").on("focus", function() {
            $("[data-error='sub_images']").html("");
            $(this).removeClass("is-invalid");
        });      
    });
    
</script>
@endsection

@endsection