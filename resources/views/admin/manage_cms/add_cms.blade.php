
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
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Site Setting</li>
            </ol> -->
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">      
          <div class="col-sm-12">    
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-plus"></i> CMS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('addCmsData') }}" method="POST" id="cmsForm">
                @csrf 
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="name">CMS Name:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Cms Name" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="title">CMS Title:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="description">Description:</label>
                      </div>
                      <div class="col-md-6">
                      <textarea name="description" id="description" rows="10" cols="80"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                    <div class="col-md-4"></div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-primary btn-close" href="{{ url('admin/cms') }}">Cancel</a>
                      </div>
                    </div>
                  </div>                
                </div>
              </form>
            </div>
          </div>
        </div>    
      </div>  
    </section>
</div>
<script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script>
CKEDITOR.replace('description',{
  filebrowserUploadUrl: "{{ route('ckeditor_upload', ['_token' => csrf_token() ])}}",
  filebrowserUploadMethod: 'form'
});

$("#cmsForm").validate({
  ignore: [],
  debug: false,
  rules: {
  title: {
  required: true,
  },
  name: {
    required: true,
  },
  description:{
          required: function() 
        {
          CKEDITOR.instances.description.updateElement();
        },
          minlength:10
    }
  },
  messages: {
    title: { 
      required: "Please CMS Page Title"
    },
    name: {
      required: "Please CMS Page Name"
    },
    description: {
      required: "Please Enter CMS Description",
      minlength:"Please enter 10 characters"
    }

  },
  errorPlacement: function (error, element) { 
    element.css('background', '#ffdddd'); 
    error.insertAfter(element); 
  } 
});

</script>
@endsection