<!-- Modal -->
<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="AddCategoryLabel"
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
                        <input name="category_name" type="text" class="form-control" id="categoryName" aria-describedby="mainCategory"
                            placeholder="Category Name">
                        <small id="mainCategory" class="form-text text-muted">Enter your main Category</small>
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
