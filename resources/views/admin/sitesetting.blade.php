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
            @if ($message = Session::get('message'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
            @endif
              <div class="card-header">
                <h3 class="card-title">Site Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('addUpdateSiteSetting')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="site_name">Site Name:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Enter email" value="<?php if(isset($ss)){ echo $ss['site_name']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('site_name'))
                      <div class="error">{{ $errors->first('site_name') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="site_logo">Site logo:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="file" class="form-control" id="site_logo" name="site_logo" placeholder="Enter logo" value="<?php if(isset($ss)){ echo $ss['site_logo']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('site_logo'))
                      <div class="error">{{ $errors->first('site_logo') }}</div>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                      <img src="{{ asset('uploads/siteSettingLogo/' . $ss->site_logo) }}" alt="site_logo" height="100px" width="100px" style="border:1px solid grey;"/>
                      <h6><?php if(isset($ss)){ echo $ss['site_logo']; } ?></h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <h3>Email Setting</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="admin_email">Admin Email:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="admin_email" id="admin_email" placeholder="Enter Admin email"  value="<?php if(isset($ss)){ echo $ss['admin_email']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('admin_email'))
                      <div class="error">{{ $errors->first('admin_email') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="from_email">From Email:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="from_email" id="from_email" placeholder="Enter From email" value="<?php if(isset($ss)){ echo $ss['from_email']; } ?>" >
                      </div>
                    </div>
                    @if($errors->has('from_email'))
                      <div class="error">{{ $errors->first('from_email') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="smtp_host">SMTP Host:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="smtp_host" id="smtp_host" placeholder="Enter SMTP Host" value="<?php if(isset($ss)){ echo $ss['smtp_host']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('smtp_host'))
                      <div class="error">{{ $errors->first('smtp_host') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="smtp_port">SMTP Port:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="smtp_port" id="smtp_port" placeholder="Enter SMTP Port" value="<?php if(isset($ss)){ echo $ss['smtp_port']; } ?>" >
                      </div>
                    </div>
                    @if($errors->has('smtp_port'))
                      <div class="error">{{ $errors->first('smtp_port') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="smtp_username">SMTP Username:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="smtp_username" id="smtp_username" placeholder="Enter SMTP Username" value="<?php if(isset($ss)){ echo $ss['smtp_username']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('smtp_username'))
                      <div class="error">{{ $errors->first('smtp_username') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="smtp_password">SMTP Password:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="smtp_password" id="smtp_password" placeholder="Enter SMTP Password" value="<?php if(isset($ss)){ echo $ss['smtp_password']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('smtp_password'))
                      <div class="error">{{ $errors->first('smtp_password') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-2">
                        <label for="google_key">Google Keys:</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" class="form-control required" name="google_key" id="google_key" placeholder="Enter Google Keys" value="<?php if(isset($ss)){ echo $ss['google_key']; } ?>">
                      </div>
                    </div>
                    @if($errors->has('google_key'))
                      <div class="error">{{ $errors->first('google_key') }}</div>
                    @endif
                  </div> 
                </div>
                <div class="card-footer">
                <div class="row">
                  <div class="col-md-2"></div>
                    <button type="submit" class="btn btn-primary submitData">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>    
      </div>  
  </section>
</div>
  @endsection
 