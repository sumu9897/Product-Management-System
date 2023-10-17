<!-- resources/views/assign.blade.php -->

@extends('admindashboard')

@section('styles')
    <style>
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
@endsection

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between mb-4">
            <h3>Assign Product</h3>
            <button onclick="goBack()" class="btn btn-secondary">Go Back</button>
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
                <label for="product_serial">Product Serial Number</label>
                <select name="product_serial" id="product_serial" class="form-control" onchange="updateProductName()">
                    <option value="" disabled selected>Select Product</option>
                    @foreach($inactiveProducts as $row)
                        <option value="{{ $row->serial }}" data-status="{{ $row->status }}">{{ $row->serial }} - {{ $row->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_serial'))
                    <div class="error invalid-feedback">{{ $errors->first('product_serial') }}</div>
                @endif
                <span id="product_name">Unknown Product</span>
            </div>

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

            <!-- Add hidden fields for product_name and user_name -->
            <input type="hidden" name="product_name" id="hidden_product_name" value="">
            <input type="hidden" name="user_name" id="hidden_user_name" value="">
        </form>

        @include('layouts.footer')
    </div>

    @push('scripts')
        <script>
            // JavaScript code goes here
        </script>
    @endpush
@endsection
