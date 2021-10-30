@extends('layouts.admin_app')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-right">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">SMTP Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-6 offset-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Your Smtp Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('smtp.setting.update',$smtp->id)}}" method="Post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mailer</label>
                    <input type="text" class="form-control" name="mailer" value="{{$smtp->mailer}}" placeholder="Mailer name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mailer Host</label>
                    <input type="text" class="form-control" name="host" value="{{$smtp->host}}" placeholder="Mailer Host">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Port</label>
                    <input type="text" class="form-control" name="port" value="{{$smtp->port}}" placeholder="Mailer Port">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" name="user_name" value="{{$smtp->user_name}}" placeholder="User Name">
                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" value="{{$smtp->password}}" placeholder="Password">
                    
                  </div>

                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
