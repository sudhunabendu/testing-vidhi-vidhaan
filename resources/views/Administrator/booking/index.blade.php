@extends('Administrator.master')

@section('content')

@section('title', 'Astrologer Booking | Management')

@section('bookingCSS')
<link rel="stylesheet"
    href="{{URL::asset('administrator/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"
    href="{{URL::asset('administrator/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet"
    href="{{URL::asset('administrator/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
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

<div class="ttt-toast">
    @include('Administrator.Layouts.notify')
</div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header"> --}}
              {{-- <a href="{{route('admin.create.categories')}}" class=" btn btn-info">+ Create Category</a> --}}
              {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
            {{-- </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Booking Number</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Payment Type</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php $i=1; ?>
                <tbody>
                  @if(!empty($astro_bookings))
                  @foreach ($astro_bookings as $booking)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$booking->booking_number}}</td>
                    <td>{{$booking->price}}</td>
                    <td>{{$booking->status}}</td>
                    <td>{{$booking->booking_payment_type}}</td>
                    <td>{{$booking->service_date}}</td>
                    <td>{{$booking->service_time}}</td>
                    <td>{{$booking->payment_status}}</td>
                    <td>
                      <a href="{{route('admin.bookings.show',$booking->id)}}"><i class="fas fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
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
  
@section('bookingJS')

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
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
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

<script>
  $('input[name=toogle]').change(function(){
      var mode=$(this).prop('checked');
      var id=$(this).val();
      console.log(id);
      $.ajax({
        url:"{{route('admin.products.status_change')}}",
        type:"POST",
        data:{
          _token:'{{csrf_token()}}',
          mode:mode,
          id:id,
        },
        success:function(response){
          console.log(response.status)
          if(response.status){
            Swal.fire({
            title: "Success!",
            // text: response.status,
            // text: "{{session('success')}}",
            text: "Status changed successfully",
            icon: "success",
            showConfirmButton: false,
            timer: 2500
          });
            // alert(response.msg)
            console.log(response.msg)
          }else{
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Please try again later",
              showConfirmButton: false,
              timer: 2500
          });
            // alert('Please try again later');
          }
        }
      })
    });
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $('.dltBtn').click(function(e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
              if (willDelete) {
                  form.submit();
                  swal("Poof! Your imaginary file has been deleted!", {
                      icon: "success",
                  });
              } else {
                  swal("Your imaginary file is safe!");
              }
          });
  });
  
  </script>

@endsection
  @endsection