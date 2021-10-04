<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Category Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.update') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input name="category_name" type="text" class="form-control" id="e_categoryName" aria-describedby="mainCategory">
                        <small id="mainCategory" class="form-text text-muted">Enter your main Category</small>
                        <input type="hidden" name="id" id="e_cat_id">
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
