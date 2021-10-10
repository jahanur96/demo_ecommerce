@extends('layouts.admin_app')
@push('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Child category Table </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">ChildCategory</li>
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
                            <div class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#AddCategory">+ Add SubCategory</button></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="#" class="table table-bordered table-striped table-sm yTable">
                                <thead>
                                    <tr class="text-center">
                                        <th>sl</th> 
                                        <th>category_name</th>
                                        <th>subcategory_name</th>
                                        <th>childcategory_name</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   

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




@endsection

@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    $.fn.dataTable.ext.errMode = 'throw';
</script>
    <script>
        
       $(function childcategory(){
           var table = $('.yTable').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{ route('childcategory.index') }}",
                columns:[
                    {data:'DT_RowIndex',name:'DT_RowIndex'},
                    {data:'category_name',name:'category_name'},
                    {data:'subcategory_name',name:'subcategory_name'},
                    {data:'childcategory_name',name:'childcategory_name'},
                    {data:'action',name:'action',orderable:true,searchable:true},
                ]
           });
       })
    </script>
@endpush