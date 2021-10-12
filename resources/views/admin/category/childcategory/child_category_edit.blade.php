<form method="POST" action="{{ route('childcategory.update',[$child_cat->id]) }}">
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
                    <option value="{{ $subcat->id }}" @if ($subcat->id == $child_cat->subcategory_id) selected
                        
                    @endif>---{{ $subcat->subcategory_name }}</option> 
                    @endforeach
                @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label for="childcategory_name">Child Category Name</label>
            <input name="childcategory_name" type="text" class="form-control" id="childcategory_name" aria-describedby="mainCategory"
                value="{{ $child_cat->childcategory_name }}">
            <small id="mainCategory" class="form-text text-muted">Enter your Child Category</small>
        </div>
    </div>
    <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> <span class="d-none">Loading.....</span> Update</button>
    </div>
</form>