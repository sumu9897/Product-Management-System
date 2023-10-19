@extends('admindashboard')

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Change SBU</h3>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success w-100">{{ session('success') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger w-100">{{ session('error') }}</div>
    @endif

    <form action="{{ route('shift.store') }}" method="POST">
        @csrf

        {{-- <div class="form-group">
            <label for="product_serial">Product Serial Number</label>
            <select name="product_serial" id="product_serial" class="form-control">
                <option>select</option>
                @foreach($products as $product)
                    <option value="{{ $product->serial }}">{{ $product->serial }}</option>
                @endforeach
            </select>
            @if($errors->has('product_serial'))
                <div class="error invalid-feedback">{{ $errors->first('product_serial') }}</div>
            @endif
        </div> --}}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="serial">Serial:</label>
            <input type="text" name="serial" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sbu">SBU:</label>
            <input type="text" name="sbu" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Now_SBU">Now SBU:</label>
            <input type="text" name="Now_SBU" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Shift_Date">Shift Date:</label>
            <input type="date" name="Shift_Date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Shift_by">Shift by:</label>
            <input type="text" name="Shift_by" class="form-control" required>
        </div>


        

        <button type="submit" class="btn btn-primary">Shift Product</button>
    </form>
</div>
