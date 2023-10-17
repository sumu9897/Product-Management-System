@extends('admindashboard')
<title>Edit Product</title>
<div class="content">
    

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('product.all') }}">List Products</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" required="required" class="form-control" placeholder="product name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Product Serial Number </label>
            <input type="text" name="serial" class="form-control" value="{{ $product->serial }}" disabled>
        </div>
        <div class="form-group">
            <label>Product Model</label>
            <input type="text" name="model" required="required" class="form-control" placeholder="product model" value="{{ $product->model }}">
        </div>
        <div class="form-group">
            <label>Product Capacity</label>
            <input type="text" name="capacity" required="required" class="form-control" placeholder="product capacity" value="{{ $product->capacity }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder="product description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Product Document</label>
            <input type="file" name="document"   value="{{ $product->document }}">
        </div>
        <div class="form-group">
            <label>Purchase Price</label>
            <input type="number" name="price" class="form-control" placeholder="Purchase Price" min="0" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label>Purchase Date</label>
            <input type="date" name="Purchase_Date" required="required" value="{{ $product->Purchase_Date }}">
        </div>
        <div class="form-group">
            <label>Purchase SBU</label>
            <select required="required" name="SBU" class="form-control" id="purchaseSBU">
                <option value="" disabled selected>Select Purchase SBU</option>
                <option value="JMI Group">JMI Group</option>
                <option value="JMIBL">JMIBL</option>
                <option value="JHL">JHL</option>
                <option value="JMEL">JMEL</option>
                <option value="JFL">JFL</option>
                <option value="JGL">JGL</option>
                <option value="JSL">JSL</option>
            </select>
            
        </div>
        <script>
            document.getElementById('purchaseSBU').addEventListener('change', function () {
                var selectedValue = this.value;
                console.log("Selected SBU: " + selectedValue);
                // You can use the selectedValue variable as needed.
            });
        </script>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Product Status</label>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="active" type="radio" id="customRadio1" name="status" @if($product->status == 'active') checked="checked" @endif>
                <label for="customRadio1" class="custom-control-label">Active</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="stock" type="radio" id="customRadio2" name="status" @if($product->status == 'stock') checked="checked" @endif>
                <label for="customRadio2" class="custom-control-label">In Stock</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="disable" type="radio" id="customRadio3" name="status" @if($product->status == 'disable') checked="checked" @endif>
                <label for="customRadio3" class="custom-control-label">Disable</label>
            </div>
            @if($errors->has('status'))
                <span class="error invalid-feedback">{!! $errors->first('status') !!}</span>
            @endif
        </div>
        <div class="form-group">
            <label>Product Warranty or Guarantee</label>
            <input type="text" name="P_WG" required="required" class="form-control" placeholder="Product Warranty or Guarantee" value="{{ $product->P_WG }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include('layouts.footer')
</div>
