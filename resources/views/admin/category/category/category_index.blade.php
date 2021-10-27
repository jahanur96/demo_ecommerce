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
                            <div class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#AddCategory" id="addCategoryBtn">+ Add Category</button></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->category_name }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editCategory"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="edit"></i></button>
                                            <a href="{{ route('category.delete',[$row->id]) }}" id="delete" class="btn btn-warning btn-sm"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="delete"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
@include('admin.category.category.category_add')
@include('admin.category.category.category_edit')

@push('script')

    <script>
         $('body').on('click','#addCategoryBtn',function(){
            $('#AddCategory').modal({ backdrop: 'static', keyboard: false })
            
        });
        
        $('body').on('click','.edit',function(){
            $('#editCategory').modal({
                backdrop: 'static',
                keyboard: false
            })
            let cat_id = $(this).data('id')
            $.get("edit/"+cat_id,function(data){
                $('#e_categoryName').val(data.category_name)
                $('#e_cat_id').val(data.id)
            });
        });
    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#editCategory').modal('show');
        @endif
    </script>
@endpush

@endsection