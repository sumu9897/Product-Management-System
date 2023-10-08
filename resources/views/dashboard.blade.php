@extends('admindashboard')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    <p class="lead">You are logged in.</p>

                    <div class="mt-4">
                        <button class="btn btn-success"><a href="{{ route('product.create') }}" class="text-white">Add Product</a></button>
                        <button class="btn btn-info"><a href="{{ route('product.all') }}" class="text-white">All Products</a></button>
                        <button class="btn btn-success"><a href="{{ route('user.create') }}" class="text-white">Add User</a></button>
                        <button class="btn btn-info"><a href="{{ route('user.all') }}" class="text-white">Employee Details</a></button>
                        <button class="btn btn-success"><a href="{{ route('assign.create') }}" class="text-white">Assign Product</a></button>
                        <button class="btn btn-info"><a href="{{ route('assign.all') }}" class="text-white">Assigned Products</a></button>
                        <button class="btn btn-success"><a href="#" class="text-white">History</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

