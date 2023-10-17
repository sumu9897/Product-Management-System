@extends('admindashboard')

<div class="content">
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

                        <div class="content">
                            <p>Total Products: {{ App\Models\Product::count() }}</p>
                            <!-- Other dashboard content goes here -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
