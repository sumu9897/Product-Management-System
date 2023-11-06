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
        <h3>Show Shifting Product</h3>
    </div>

    <div class="form-group">
        <label>Product Name and ID</label>
        <input type="text" name="name" class="form-control" value="{{ $shift->product_serial }}" disabled>
    </div>
</div>