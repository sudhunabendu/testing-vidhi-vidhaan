@extends('Administrator.master')

@section('content')

@section('title', 'User | Management')

@section('productCSS')
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $i=1; ?>
                            <tbody>
                                @if(!empty($users))

                                @foreach($users as $user)
                                <?php $number = $user->dial_code . $user->mobile_number ?>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$number ? $number : "Not available"}}</td>
                                    @php
                                    if ( $user->status == 'Active'):
                                    $color = 'success';
                                    else:
                                    $color = 'danger';
                                    endif;
                                    @endphp
                                    {{-- <td><span class="badge badge-{{$color}}">{{ucwords($user->status)}}</span></td> --}}
                                    <td>
                                        <div class="switch">
                                            <input type="checkbox" name="toogle1" value="{{$user->id}}" {{$user->status=='Active' ?
                                            'checked' : ''}} data-toggle="toggle"
                                            data-on="Active" data-off="Inactive" data-onstyle="success"
                                            data-offstyle="danger">
                                          </div>
                                    </td>
                                    <td>
                                        <form style="margin-left: 36px;" action="{{route('admin.delete.users',$user->id)}}"
                                            method="POST">
                                            @csrf
                                            <a href="" data-toggle="tooltip" title="delete" data-id="{{$user->id}}" style="color: red"
                                              data-placement="botton"><i class="far fa-trash-alt dltBtn"></i></a>
                                          </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                {{-- <tr>
                                    <td>Trident</td>
                                    <td>Internet</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                    <td>X</td>
                                </tr> --}}
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

@section('usersJS')
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


<script>
    $('input[name=toogle1]').change(function(){
        var mode=$(this).prop('checked');
        var id=$(this).val();
        console.log(id);
        $.ajax({
          url:"{{route('admin.user.status_change')}}",
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
@endsection

@endsection