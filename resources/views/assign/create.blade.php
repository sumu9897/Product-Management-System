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

    /* Add a style for the inactive message */
    #inactiveMessage {
        color: red;
    }
</style>
<script>
    function toggleReturningDate() {
        var statusSelect = document.getElementById("status");
        var productSerialDropdown = document.getElementById("product_serial");
        var rdate = document.getElementById("returningDate");
        var inactiveMessage = document.getElementById("inactiveMessage");

        var selectedOption = productSerialDropdown.options[productSerialDropdown.selectedIndex];
        var productStatus = selectedOption.getAttribute("data-status");

        if (statusSelect.value === "active" && productStatus !== "inactive") {
            rdate.style.display = "none"; // Hide the returning date field
            inactiveMessage.style.display = "none"; // Hide the inactive message
        } else {
            rdate.style.display = "block"; // Show the returning date field

            // If the product is inactive, show the inactive message
            if (productStatus === "inactive") {
                inactiveMessage.style.display = "block";
                // Do not reset the dropdown, allow selection even if inactive
            } else {
                inactiveMessage.style.display = "none"; // Hide the inactive message
            }
        }
    }
</script>

<script>
    function toggleAssignProductButton() {
        var statusSelect = document.getElementById("status");
        var assignProductButton = document.getElementById("assignProductButton");

        // Check if the product status is "stock"
        assignProductButton.style.display = (statusSelect.value === "stock") ? "block" : "none";
    }
</script>

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Assign Product</h3>
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

    <!-- Add this div to display the inactive message -->
    <div id="inactiveMessage" style="display: none;">
        This product is inactive. You can assign it to another person.
    </div>

    <form action="{{ route('assign.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_serial"> Available Product Serial Number</label>
            <select name="product_serial" id="product_serial" class="form-control" onchange="updateProductName()">
                <option value="" disabled selected>Select Product</option>
                @foreach($products as $row)
                    @if ($row->status == 'stock')
                        <option value="{{ $row->serial }}" data-status="{{ $row->status }}">{{ $row->serial }} - {{ $row->name }}</option>
                    @endif
                @endforeach
            </select>
            @if($errors->has('product_serial'))
                <div class="error invalid-feedback">{{ $errors->first('product_serial') }}</div>
            @endif
            <span id="product_name">Unknown Product</span>
        </div>

        <script>
            function updateProductName() {
                var selectElement = document.getElementById('product_serial');
                var productNameElement = document.getElementById('product_name');
                var hiddenProductNameElement = document.getElementById('hidden_product_name');
  
                // Get the selected option
                var selectedOption = selectElement.options[selectElement.selectedIndex];

                // Update the span with the selected product's name
                productNameElement.textContent = selectedOption.text;

                // Set the value in the hidden input field
                hiddenProductNameElement.value = selectedOption.text;
            }
        </script>

        <div class="form-group">
            <label for="user_id">Employee Name</label>
            <select name="user_id" id="user_id" onchange="updateUserName()" class="form-control">
                <option value="" disabled selected>Select Employee</option>
                @foreach ($employees as $row)
                    <option value="{{ $row->user_id }}">{{ $row->user_id }} - {{ $row->name }}</option>
                @endforeach
            </select>
            @if($errors->has('user_id'))
                <div class="error invalid-feedback">{{ $errors->first('user_id') }}</div>
            @endif
            <span id="user_name">Unknown User</span>
        </div>

        <script>
            function updateUserName() {
                var selectElement = document.getElementById('user_id');
                var userNameElement = document.getElementById('user_name');
                var hiddenUserNameElement = document.getElementById('hidden_user_name');

                // Get the selected option
                var selectedOption = selectElement.options[selectElement.selectedIndex];

                // Update the span with the selected user's name
                userNameElement.textContent = selectedOption.text;

                // Set the value in the hidden input field
                hiddenUserNameElement.value = selectedOption.text;
            }
        </script>

        <div class="form-group">
            <label for="adate">Assign Date</label>
            <input required="required" type="date" name="adate" class="form-control">
        </div>

        <label for="status">Status</label>
        <select name="status" id="status" onchange="toggleReturningDate()" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <div id="returningDate" style="display: none;">
            <label for="rdate">Returning Date:</label>
            <input name="rdate" type="date" id="rdate" class="form-control">
        </div><br><br>

        <button type="submit" class="btn btn-primary">Assign Product</button>

        <!-- Show the Assign Product button only for stock products -->
        <button type="submit" class="btn btn-primary" id="assignProductButton" style="display: none;">Assign Product</button>

        <!-- Add hidden fields for product_name and user_name -->
        <input type="hidden" name="product_name" id="hidden_product_name" value="">
        <input type="hidden" name="user_name" id="hidden_user_name" value="">
    </form>

    @include('layouts.footer')
</div>
