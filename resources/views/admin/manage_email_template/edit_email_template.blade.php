
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
                <h3 class="card-title"><i class="fas fa-edit"></i> Email Template</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('updateMailTemp') }}" method="POST" >
                @csrf 
                <input type="hidden" name="id" value="{{ $email_temp->id}}">
                <input type="hidden" name="status" value="{{ $email_temp->status}}">
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="email_template_name">Email Template Name:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="email_template_name" name="email_template_name" placeholder="Enter Email Template Name" value="{{$email_temp->email_template_name}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="site_logo">Subject:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" value="{{$email_temp->subject}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="site_logo">Action:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="action" name="action" placeholder="Enter Action" value="{{$email_temp->action}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="site_logo">Email Html:</label>
                      </div>
                      <div class="col-md-6">
                      <textarea name="email_content" id="email_content" rows="10" cols="80">{{$email_temp->email_content}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                <div class="row">
                  <div class="col-md-2"></div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
<script>
       CKEDITOR.replace('email_content',{
        filebrowserUploadUrl: "{{ route('ckeditor_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
      });
</script>
@endsection