@extends('admin.master')

@section("content")

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('/plugins/bootstrap-switch-button/css/bootstrap-switch-button.min.css')}}" rel="stylesheet"/>  
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
                    <h3 class="card-title">Manage Email Template</h3>
                    <div class="text-right">
                        <a href="{{ url('/admin/add_email_template') }}" class="btn btn-light pull-right"><span style="color:black">+ Add Email Template</span></a>
                    </div>
                </div>
                <div class="alert alert-success alert-block change_status" style="display:none">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong id="status"></strong>
                </div>
                @if ($message = Session::get('status_failed'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="container mt-5">
                  <table class="table table-bordered user-datatable">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Email Template Name</th>
                        <th>Subject Name</th>
                        <th>Status</th>
                        <th>Action</th>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{ asset('/plugins/bootstrap-switch-button/dist/bootstrap-switch-button.min.js')}}"></script> 
<script type="text/javascript">
  $(function () {
    var table = $('.user-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('emailTemplateList') }}",
        columns: [
          {data: 'id', name: 'id' , orderable: true},
          {data: 'email_template_name', name: 'email_template_name' , orderable: true, searchable: true},
          {data: 'subject', name: 'subject' , orderable: true, searchable: true},
          {data: 'status', name: 'status' , orderable: true, searchable: true},
          {data: 'action', name: 'action'},
        ],
    });

    $(document).on('change', '.switch', function(){
      var status = $(this).prop('checked') == true ? "Active" : "Inactive"; 
        var id = $(this).attr('id');
          $.ajax({
          type: "GET",
          dataType: "json",
          url: '{{ route("changeStatus")}}',
          data: {'status': status, 'id': id},
          success: function(data){
            console.log(data.status_success);
            $('.change_status').show();
            $('#status').html(data.status_success);
          }
      });
    });
});


</script>
  
@endsection