@extends('layouts.admin_app')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#AddCategory">+ Add Category</button></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped table-sm ytable">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Child Category Name</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div id="modal_body">

                                    </div>
                                </tbody>
                              
                            </table>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- add Category modal -->


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function childcategory(){
            var table = $('.ytable').DataTable({
                processing:true,
                serverSide:true,
                ajax:("{{ route('childcategory.index') }}"),
                columns:[
                    {data:'DT_RowIndex', name:'DT_RowIndex'},
                    {data:'childcategory_name', name:'childcategory_name'},
                    {data:'category_name', name:'category_name'},
                    {data:'subcategory_name', name:'subcategory_name'},
                    {data:'action', name:'action',orderable:true,searchable:true},
                ]

            });
        });
        
    </script>
@endpush

@endsection