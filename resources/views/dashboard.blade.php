@extends('admindashboard')

<div class="content">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>{{ __('Welcome to the Dashboard') }}</h5>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h4 class="mb-4">Greetings, {{ Auth::user()->name }}!</h4>
                        <p class="lead">You are logged in.</p>

                        <div class="row">
                            <div class="col-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <h6 class="text-uppercase mt-0" title="Customers">Total Products</h6>
                                        <h2 class="my-2">{{ App\Models\Product::count() }}</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <h6 class="text-uppercase mt-0" title="Customers">Disable Product</h6>
                                        <h2 class="my-2">{{ App\Models\Product::where('status', 'disable')->count() }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="card widget-flat text-bg-info">
                                        <div class="card-body">
                                            <h6 class="text-uppercase mt-0" title="Customers">Total Assign Products</h6>
                                            <h2 class="my-2">{{ App\Models\Assign::count() }}</h2>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-6">
                                    <div class="card widget-flat text-bg-info">
                                        <div class="card-body">
                                            <h6 class="text-uppercase mt-0" title="Customers">Total Active Product</h6>
                                            <h2 class="my-2">{{ App\Models\Assign::where('status', 'active')->count() }}</h2>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
