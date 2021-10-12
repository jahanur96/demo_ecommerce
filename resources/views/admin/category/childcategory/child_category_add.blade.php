<!-- Modal -->
<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="AddCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddCategoryLabel">Child Category Insert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('childcategory.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoryName">Subcategory Name</label>
                        <select name="subcategory_id" class="form-control" required>
                            <option value="">Select sub category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" disabled>{{ $cat->category_name }}</option> 
                                @php
                                    $subcategories = App\Models\Subcategory::where('category_id',$cat->id)->get();
                                @endphp
                                @foreach ($subcategories as $subcat)
                                <option value="{{ $subcat->id }}">---{{ $subcat->subcategory_name }}</option> 
                                @endforeach
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="childcategory_name">Child Category Name</label>
                        <input name="childcategory_name" type="text" class="form-control" id="childcategory_name" aria-describedby="mainCategory"
                            placeholder="Child Category Name">
                        <small id="mainCategory" class="form-text text-muted">Enter your Child Category</small>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary"> <span class="d-none">Loading.....</span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
