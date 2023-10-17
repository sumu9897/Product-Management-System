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

    form {
        max-width: 600px;
        margin: auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    #userName {
        font-weight: bold;
        color: #28a745;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<script>
    function toggleReturningDate() {
        var statusSelect = document.getElementById("status");
        var rdate = document.getElementById("returningDate");

        if (statusSelect.value === "active") {
            rdate.style.display = "none"; // Hide the input field
        } else {
            rdate.style.display = "block"; // Show the input field
        }
    }

    function updateProductName() {
        var selectElement = document.getElementById('product_serial');
        var productNameElement = document.getElementById('product_name');

        // Get the selected option
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Update the span with the selected product's name
        productNameElement.textContent = selectedOption.text;
    }

    function updateUserName() {
        var selectElement = document.getElementById('user_id');
        var userNameElement = document.getElementById('user_name');

        // Get the selected option
        var selectedOption = selectElement.options[selectElement.selectedIndex];

        // Update the span with the selected user's name
        userNameElement.textContent = selectedOption.text;
    }
</script>

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Assign</h3>
        <button onclick="goBack()" class="btn btn-secondary">Go Back</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('assign.update', $assign->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Add this line to specify that it's an update request -->

        <!-- Add a hidden field for the assign ID -->
        <input type="hidden" name="assign_id" value="{{ $assign->id }}">

        <div class="form-group">
            <label>Product Serial Number</label>
            
                <input type="text" class="form-control" name="product_serial" value="{{ $assign->product_serial }}" disabled>
                
       
           
                @if($errors->has('product_serial'))
                    <span class="error invalid-feedback"> {{ $errors->first('product_serial') }} </span>
                @endif
        </div>
        <div class="form-group">
            <label>Product Name</label>
            
                <input type="text" class="form-control" name="product_name" value="{{ $assign->product_name }}" disabled>
                
       
           
                @if($errors->has('product_serial'))
                    <span class="error invalid-feedback"> {{ $errors->first('product_name') }} </span>
                @endif
        </div>

        <div class="form-group">
            <label for="user_id">Employee Name</label>
            <select name="user_id" id="user_id" onchange="updateUserName()" class="form-control">
                <option value="" disabled selected>Select Employee</option>
                @foreach ($employees as $row)
                    <option value="{{ $row->user_id }}" {{ $assign->user_id === $row->user_id ? 'selected' : '' }}>
                        {{ $row->user_id }} - {{ $row->name }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('user_id'))
                <div class="error invalid-feedback">{{ $errors->first('user_id') }}</div>
            @endif
            <span id="user_name">Unknown User</span>
        </div>

        <div class="form-group">
            <label for="adate">Assign Date</label>
            <input required="required" type="date" name="adate" class="form-control" value="{{ $assign->adate }}">
        </div>

        <label for="status">Status</label>
        <select name="status" id="status" onchange="toggleReturningDate()" class="form-control">
            <option value="active" {{ $assign->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $assign->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <div id="returningDate" style="{{ $assign->status === 'active' ? 'display:none' : '' }}">
            <label for="rdate">Returning Date:</label>
            <input name="rdate" type="date" id="rdate" class="form-control" value="{{ $assign->rdate }}">
        </div><br><br>

        <button type="submit" class="btn btn-primary">Update Assign</button>
    </form>

    @include('layouts.footer')
</div>
