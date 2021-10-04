<!-- Modal -->
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
