@extends('admindashboard')

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Add Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('product.all') }}">List Products</a>
        <a href="{{ url()->previous() }}">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Back</span>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success w-100">{{ session('success') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger w-100">{{ session('error') }}</div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Product Name</label>
            <input required="required" type="text" name="name" class="form-control" placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label for="model">Product Model</label>
            <input required="required" type="text" name="model" class="form-control" placeholder="Enter product model">
        </div>

        <div class="form-group">
            <label for="capacity">Product Capacity</label>
            <input required="required" type="text" name="capacity" class="form-control" placeholder="Enter product capacity">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="5" placeholder="Enter product description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="document">Product Document</label><br>
            <input required="required" type="file" name="document">
        </div>

        <div class="form-group">
            <label for="price">Product Price</label>
            <input required="required" type="number" name="price" class="form-control" placeholder="Enter product price" min="0">
        </div>

        <div class="form-group">
            <label for="Purchase_Date">Purchase Date</label><br>
            <input required="required" type="date" name="Purchase_Date">
        </div>

        <div class="form-group">
            <label for="SBU">Purchase SBU</label>
            <input required="required" type="text" name="SBU" class="form-control" placeholder="Enter Purchase SBU">
        </div>

        <div class="form-group">
            <label>Product Status</label><br>
            <label><input type="radio" name="status" value="active"> Active</label><br>
            <label><input type="radio" name="status" value="stock"> In Stock</label>
        </div>

        <div class="form-group">
            <label for="P_WG">Product Warranty or Guarantee</label>
            <input required="required" type="text" name="P_WG" class="form-control" placeholder="Enter Product Warranty or Guarantee">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
