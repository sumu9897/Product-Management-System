@extends('admindashboard')

<div class="content">

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Product</h3>
    </div>

    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" disabled>
    </div>
    <div class="form-group">
        <label>Product Serial Number</label>
        <input type="text" name="serial" class="form-control" value="{{ $product->serial }}" disabled>
    </div>
    <div class="form-group">
        <label>Product Model</label>
        <input type="text" name="model" class="form-control" value="{{ $product->model }}" disabled>
    </div>
    <div class="form-group">
        <label>Product Capacity</label>
        <input type="text" name="capacity" class="form-control" value="{{ $product->capacity }}" disabled>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="5" placeholder="product description" class="form-control" disabled>{{ $product->description }}</textarea>
    </div>
    


    <div class="form-group">
        <label>Purchase Document</label>
        <div>
            @if($product->document)
                <a href="{{ route('product.download', ['product' => $product->id]) }}" download="{{ $product->document }}">
                    Download Document
                </a>
            @else
                No document available
            @endif
        </div>
    </div>
    
    <div class="form-group">
        <label>Purchase Price</label>
        <input type="text" name="price" class="form-control" value="{{ $product->price }}" disabled>
    </div>
    <div class="form-group">
        <label>Purchase Date</label>
        <input type="date" name="Purchase_Date" class="form-control" value="{{ $product->Purchase_Date }}" disabled>
    </div>

    <div class="form-group">
        <label>Purchase SBU</label>
        <input type="text" name="SBU" class="form-control" value="{{ $product->SBU }}" disabled>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Purchase Status</label>

        <!-- ... Your radio button code ... -->

        @if($errors->has('status'))
            <span class="error invalid-feedback">{!! $errors->first('status') !!}</span>
        @endif
    </div>
    <div class="form-group">
        <label>Product Warranty or Guarantee</label>
        <input type="text" name="P_WG" class="form-control" value="{{ $product->P_WG }}" disabled>
    </div>

    <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Edit</a>
</div>
