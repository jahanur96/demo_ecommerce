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
@include('admin.category.subcategory.subcategory_add')


<!-- Modal -->
{{-- subcategory edit --}}
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Sub Category Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="subcat_edit_form">

            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        $('body').on('click','.edit',function(){
            let subcat_id = $(this).data('id')
            $.get("edit/"+subcat_id,function(data){
                $('#subcat_edit_form').html(data);
            });
        });
    </script>
@endpush