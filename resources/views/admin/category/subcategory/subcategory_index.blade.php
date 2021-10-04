@extends('layouts.admin_app')

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub category Table </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">SubCategory</li>
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
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>SubCategory Name</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key=>$row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->subcategory_name }}</td>
                                        <td>{{ $row->category->category_name }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editCategory"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="edit"></i></button>
                                            <a href="{{ route('subcategory.delete',[$row->id]) }}" id="delete" class="btn btn-warning btn-sm"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="delete"></i></a>
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


<!-- Modal Subcategory -->
<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="AddCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddCategoryLabel">SubCategory Insert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('subcategory.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select One</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option> 
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategoryName">Sub Category Name</label>
                        <input name="subcategory_name" type="text" class="form-control" id="subcategoryName" aria-describedby="mainCategory"
                            placeholder="Sub Category Name">
                        <small id="mainCategory" class="form-text text-muted">Enter your Sub Category</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.category.subcategory.subcategory_edit')

@push('script')
    <script>
        $('body').on('click','.edit',function(){
            let cat_id = $(this).data('id')
            $.get("edit/"+cat_id,function(data){
                $('#e_categoryName').val(data.category_name)
                $('#e_cat_id').val(data.id)
            });
        });
    </script>
@endpush

@endsection