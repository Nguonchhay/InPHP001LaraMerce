<div class="mb-3">
    <label for="category_id" class="form-label">Category *</label>
    <select class="form-control" required id="category_id" name="category_id">
        <option value="" selected>Please select Category</option>
        @foreach($categories as $id => $title)
            <option {{ !empty($product) && $product->category_id == $id ? ' selected ' : '' }} value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="name" class="form-label">Product Name *</label>
    <input type="text" class="form-control" required id="name" name="name" value="{{ empty($product) ? '' : $product->name }}">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Product Description *</label>
    <textarea class="form-control" required id="description" name="description">{{ empty($product) ? '' : $product->description }}</textarea>
</div>
<div class="mb-3">
    <label for="unit_price" class="form-label">Unit Price *</label>
    <input type="text" class="form-control" required id="unit_price" name="unit_price" value="{{ empty($product) ? '' : $product->unit_price }}">
</div>
<div class="mb-3">
    <label for="qty_in_stock" class="form-label">Quantity In Stock</label>
    <input type="number" class="form-control" required id="qty_in_stock" name="qty_in_stock" value="{{ empty($product) ? '0' : $product->qty_in_stock }}">
</div>
<div class="mb-3">
    <label for="image" class="form-label">Image *</label>
    <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" {{ empty($product) ? 'required' : '' }} id="image" name="image">
    @if(!empty($product))
        <p class="mt-3">Existing image: </p>
        <img src="{{ asset($product->image_url) }}" class="w-50" alt="" />
    @endif
</div>