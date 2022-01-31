
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
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ $blog->title}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Blog Name :{{ $blog->title}}<br>
                Blog Image :
                      <img src="{{ asset('uploads/blogimage/' . $blog->image) }}" alt="Blog Image" height="100px" width="100px" style="border:1px solid grey;"/><br>
                Blog Status :{{ $blog->status}}<br>
                Created Date : {{ $blog->created_at}}<br>
                Blog Description : {{ $blog->description}}<br>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>
<script type="text/javascript" src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

@endsection