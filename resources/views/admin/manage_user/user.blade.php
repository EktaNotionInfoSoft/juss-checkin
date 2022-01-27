@extends('admin.master')

@section("content")

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      <div class="col-sm-12">    
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Manage Users</h3>
                </div>
                <div class="container mt-5">
                  <table class="table table-bordered user-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
          </div>
        </div>
      </div>
  
      <div class="col-sm-3">
      </div>   
    </div>  

  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

 <script type="text/javascript">
  $(function () {
    
    var table = $('.user-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('userList') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'user_type', name: 'user_type'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
  
@endsection