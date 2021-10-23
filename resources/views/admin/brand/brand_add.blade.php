<!-- Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddModalLabel">Brand Insert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('brand.add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input name="brand_name" type="text" class="form-control" id="brand_name" aria-describedby="mainCategory"
                            placeholder="Brand Name" required>
                        <small id="mainCategory" class="form-text text-muted">Enter Brand Name</small>
                    </div>
                    <div class="form-group">
                        <label>Brand Logo</label>
                        <input type="file" name="brand_logo" class="dropify" required />

                    </div>
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary"> <span class="d-none">Loading.....</span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
