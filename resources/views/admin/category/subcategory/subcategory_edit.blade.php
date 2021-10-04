<form method="POST" action="{{ route('subcategory.update') }}">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select One</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" @if ($cat->id == $data->category_id) selected @endif>{{ $cat->category_name }}</option> 
                @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label for="subcategoryName">Sub Category Name</label>
            <input name="subcategory_name" type="text" class="form-control" value="{{ $data->subcategory_name }}" id="subcategoryName" aria-describedby="mainCategory"
                placeholder="Sub Category Name">
            <small id="mainCategory" class="form-text text-muted">Enter your Sub Category</small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>