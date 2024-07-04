@extends('Administrator.master')

@section('content')

@section('title', 'SlotBooking | Management')

@section('productCSS')
<link rel="stylesheet"
    href="{{URL::asset('administrator/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"
    href="{{URL::asset('administrator/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet"
    href="{{URL::asset('administrator/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">Dashboard</h1> --}}
               
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                        <a href="{{route('admin.slot-bookings-create')}}" class="btn btn-info">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i=1; ?>
                               @foreach ($services as $service)
                               <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset('images/service_images').'/'.$service->images}}" alt="" width="60px"
                                        height="60px"></td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->description}}</td>
                                    <td>{{$service->price}}</td>
                                    <td>
                                        <a href="">delete</a>
                                    </td>
                               </tr>
                               @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@section('productJS')
<script src="{{URL::asset('administrator/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}">
</script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}">
</script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('administrator/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection

@endsection