@extends('admindashboard')

<style>
    /* Add your custom styles here */
    body {
        background-color: #f8f9fa;
    }

    .content {
        margin: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #007bff;
    }

    /* Add additional styles as needed for the show page */

</style>

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Assigned Product Details</h3>
        <a href="{{ route('assign.all') }}" class="btn btn-secondary">Go Back</a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div>
        <h4>Assigned Product Information</h4>
        <p><strong>Product Serial Number:</strong> {{ $assign->product_serial }}</p>
        <p><strong>Product Name:</strong> {{ $assign->product_name }}</p>
        <p><strong>Employee Name:</strong> {{ $assign->user_name }}</p>
        <p><strong>Assign Date:</strong> {{ $assign->adate }}</p>
        <p><strong>Status:</strong> {{ $assign->status }}</p>
        @if($assign->status === 'inactive')
            <p style="color: red;">This product is inactive.</p>
        @endif
        @if($assign->rdate)
            <p><strong>Returning Date:</strong> {{ $assign->rdate }}</p>
        @endif
    </div>

    <!-- Add additional sections for other information you want to display -->

    <div class="mt-4">
        <a href="{{ route('assign.edit', $assign->id) }}" class="btn btn-primary">Edit Assign</a>
        <form action="{{ route('assign.delete', ['id' => $assign->id]) }}" method="POST" class="d-inline-block">
            @csrf
            
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>

    @include('layouts.footer')
</div>
