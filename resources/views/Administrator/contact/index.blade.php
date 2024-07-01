@extends('Administrator.master')

@section('content')

@section('title', 'Admin | Contact Management')

@section('productCSS')
<link rel="stylesheet"
  href="{{URL::asset('administrator/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"
  href="{{URL::asset('administrator/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet"
  href="{{URL::asset('administrator/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
  rel="stylesheet">
<style>
  .switch {
    /* position: relative;
  display: inline-block;
  width: var(--switch-width);
  height: var(--switch-height); */
    position: relative;
    display: inline-block;
    width: 90px;
    height: 34px;
  }
</style>
@endsection

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
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
          {{-- <div class="card-header">
            <a href="{{route('admin.add.products')}}" class=" btn btn-info">+ Create Product</a>
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div> --}}
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php $i=1; ?>
              <tbody>
                @if(!empty($contacts))
                @foreach ($contacts as $contact)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->email}}</td>
                  <td>{{$contact->mobile_number}}</td>
                  <td>{{ \Illuminate\Support\Str::limit($contact->message, 150, '...')}}</td>
                  <td>
                    <form style="margin-left: 36px;" action="{{route('admin.delete.contacts',$contact->id)}}"
                      method="POST">
                      @csrf
                      <a href="" data-toggle="tooltip" title="delete" data-id="{{$contact->id}}" style="color: red"
                        data-placement="botton"><i class="far fa-trash-alt dltBtn"></i></a>
                    </form>
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

@section('contactJS')
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
//   $("#example1").DataTable({
//     "responsive": true, "lengthChange": false, "autoWidth": false,
//     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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