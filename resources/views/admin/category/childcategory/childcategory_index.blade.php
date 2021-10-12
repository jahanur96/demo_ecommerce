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
                            <div class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#AddCategory">+ Add Child Category</button></div>
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


<!-- add child category modal -->
@include('admin.category.childcategory.child_category_add')

<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Child Category Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="edit_modal">

            </div>
        </div>
    </div>
</div>

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
    <script>
        $('body').on('click','.edit',function(){
            let childcat_id = $(this).data('id')
            $.get("edit/"+childcat_id,function(data){
                $('#edit_modal').html(data);
            });
        });
    </script>
@endpush

@endsection