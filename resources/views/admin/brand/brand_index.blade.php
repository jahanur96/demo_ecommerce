@extends('layouts.admin_app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
@endpush

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Brands</li>
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
                            <div class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#AddModal">+ Add Brand</button></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped table-sm ytable">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>
                                        <th>Brand Position</th>
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
@include('admin.brand.brand_add');

<div class="modal fade" id="editBrand" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Brand Edit</h5>
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js" integrity="sha512-4WpSQe8XU6Djt8IPJMGD9Xx9KuYsVCEeitZfMhPi8xdYlVA5hzRitm0Nt1g2AZFS136s29Nq4E4NVvouVAVrBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script>
    $('.dropify').dropify({
      messages: {
          'default': 'Drop File',
          'replace': 'Drag and drop or click to replace',
          'remove':  'Remove',
          'error':   'Ooops, something wrong happended.'
      }
  });
  </script>

    <script>
        $(function brands(){
            var table = $('.ytable').DataTable({
                processing:true,
                serverSide:true,
                ajax:("{{ route('brand.index') }}"),
                columns:[
                    {data:'DT_RowIndex', name:'DT_RowIndex'},
                    {data:'brand_name', name:'brand_name'},
                    {data:'brand_logo',name:'brand_logo', render: function(data, type ,full,meta){
					return "<img src={{ asset('/public/uploads/brand') }}/" +data+ "  height=\"50\"  width=\"50\"/>";
				}},

                    {data:'front_page', name:'front_page'},
                    {data:'action', name:'action',orderable:true,searchable:true},
                ]

            });
        });
        
    </script>
    <script>
        $('body').on('click','.edit',function(){
            $('#editBrand').modal({
                backdrop: 'static',
                keyboard: false
            })
            let brand_id = $(this).data('id')
            $.get("edit/"+brand_id,function(data){
                $('#edit_modal').html(data);
            });
        });
        
    </script>
@endpush

@endsection