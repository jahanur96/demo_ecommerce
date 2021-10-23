<!-- Modal -->
<div id="AddCategory" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="AddCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddCategoryLabel">Category Insert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input name="category_name"  type="text" class="form-control @error('category_name') is-invalid @enderror" id="categoryName" aria-describedby="mainCategory"
                            placeholder="Category Name" value="{{ old('category_name') }}">
                            @error('category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
