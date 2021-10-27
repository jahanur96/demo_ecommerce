<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"> 
<form method="POST" action="{{ route('brand.update',$data->id) }}" enctype="multipart/form-data" id="brand_edit">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="brand_name">Brand Name</label>
            <input name="brand_name" type="text" class="form-control" id="brand_name" 
                value="{{$data->brand_name}}" required>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Brand Logo</label>
                    <input type="file" name="brand_logo" class="dropify" />
                    <input type="hidden" name="hidden_file" value="{{ $data->brand_logo }}">
                </div>
            </div>
            <div class="col-sm-4">
                <img src="{{ asset('public/uploads/brand/'.$data->brand_logo) }}" alt="{{ $data->brand_logo }}" class="img-fluid pt-5">
            </div>
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading.....</span>Update</button>
    </div>
</form>

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
  
  