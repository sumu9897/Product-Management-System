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

        <div class="form-group">
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
        </div>


        

        <button type="submit" class="btn btn-primary">Shift Product</button>
    </form>
</div>
