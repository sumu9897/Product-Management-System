@extends('admindashboard')

<!-- Include Font Awesome in your layout file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous" />

<style>
    .document-icon {
        font-size: 24px;
        margin-right: 8px;
    }

    .document-icon.pdf {
        color: red; /* Customize color for PDF documents */
    }

    .document-icon.doc {
        color: blue; /* Customize color for Word documents */
    }

    .document-icon.default {
        color: black; /* Default color for other document types */
    }
</style>


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
                <?php
                    // Extract file extension from the document name
                    $extension = pathinfo($product->document, PATHINFO_EXTENSION);
                    // Map file extensions to corresponding Font Awesome icons
                    $iconClass = [
                        'pdf' => 'pdf',
                        'doc' => 'file-word',
                        'docx' => 'file-word', // Assuming docx is Word document type
                        // Add more mappings as needed
                    ];
                    // Get the appropriate icon class for the document type
                    $documentIcon = isset($iconClass[$extension]) ? $iconClass[$extension] : 'default';
                ?>
                <i class="document-icon {{ $documentIcon }}"></i>
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

        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="active" type="radio" id="customRadio1" name="status" @if($product->status == 'active') checked="checked"   @endif  disabled>
            <label for="customRadio1" class="custom-control-label">Active</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control-input" value="stock" type="radio" id="customRadio2" name="status" @if($product->status == 'stock') checked="checked"  @endif  disabled>
            <label for="customRadio2" class="custom-control-label">In Stock</label>
        </div>

        @if($errors->has('status'))
            <span class="error invalid-feedback">{!! $errors->first('status') !!}</span>
        @endif
    </div>
    <div class="form-group">
        <label>Product Warranty or Guarantee</label>
        <input type="text" name="P_WG" class="form-control" value="{{ $product->P_WG }}" disabled>
    </div>

    <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Edit</a>
    @include('layouts.footer')
</div>
