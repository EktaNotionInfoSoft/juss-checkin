@extends('admin.master')


@section("content")
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
      <div class="container-fluid px-1">
      <div class="col-sm-12 p-0">    
          <div class="card card-primary">
              @if ($message = Session::get('message'))
              <div class="alert alert-success alert-block message">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                      <strong>{{ $message }}</strong>
              </div>
              @endif
                <div class="alert alert-success alert-block change_status" style="display:none">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong id="status"></strong>
                </div>
                <div class="card-header">
                    <h3 class="card-title"><i class="nav-icon fa fa-envelope mr-2"></i>Email Template</h3>
                    <div class="text-right">
                        <a href="{{ url('/admin/add_email_template') }}" class="btn btn-primary pull-right addEmail"><span>+ Add Email Template</span></a>
                    </div>
                </div>
                <div class="container mt-5">
                  <table class="table table-bordered user-datatable">
                    <thead>
                      <tr>
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

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Manage Email Template</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <input type="hidden" value="" id="idData">
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure to delete record? </p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a href=""><button type="button" class="btn btn-danger deleteRecords">Delete</button></a>
          </div>
        </div>
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
        serverSide: true,
        ajax: "{{ route('emailTemplateList') }}",
        columns: [
          {data: 'email_template_name', name: 'email_template_name', searchable: true, orderable: false},
          {data: 'subject', name: 'subject' , searchable: true, orderable: false},
          {data: 'status', name: 'status' , searchable: true, orderable: false},
          {data: 'action', name: 'action'},
        ],
    });

    $(document).on('change', '.switchClass', function(){
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
    $(document).on('click', '#delete', function(){
        var id = $(this).data('id');
        $.ajax({
          type: "GET",
          dataType: "json",
          url: '{{ route("getId") }}',
          data: {'id': id},
          success: function(data){
            $('#idData').val(data.getId);
          }
      });
    });

    $(document).on('click', '.deleteRecords', function(){
        var id = $('#idData').val();
        $.ajax({
          type: "GET",
          dataType: "json",
          url: '{{ route("deleteEmailTemp") }}',
          data: {'id': id},
          success: function(data){
            console.log(data.message);
          }
      });
    });
    setTimeout(function(){
        $("div.message").remove();
    }, 5000 ); 

    setTimeout(function(){
        $("div.change_status").remove();
    }, 5000 ); 
  });


</script>
  
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('.email_template').addClass('active');
</script>

