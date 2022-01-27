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
              <li class="breadcrumb-item active">Change Password</li>
            </ol> -->
          </div>
        </div>
      </div>
    </div>
    
    <section class="content">
      <div class="container-fluid">
    
  <div class="row">    

    <div class="col-sm-3">
    </div>    

    <div class="col-sm-6">    
     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('update_password')}}" id="changepassForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="old_pass" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="new_pass" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="confirm_pass" required>
                  </div>
                  
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="change_password">Change Password</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  
    <div class="col-sm-3">
    </div>    
  </div>  
  </section>
  </div>
  
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   
  <!--  <script>
      $(document).ready(function () {
        if ($('#changepassForm').valid()) {
            alert("Validation pass");
            return false;
        }else{
            alert("Validation failed");
            return false;
          }
        // $('#changepassForm').validate({ 
        //     rules: {
        //         old_pass: {
        //             required: true
        //         },
        //         new_pass: {
        //             required: true,
        //         },
        //         confirm_pass: {
        //             required: true,
        //         },
        //     }
        // });
    });
  </script> -->

@endsection