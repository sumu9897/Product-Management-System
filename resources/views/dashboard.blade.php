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

                        <div class="content mt-4">
                            <p class="h6">Total Products: <span class="badge badge-pill badge-info">{{ App\Models\Product::count() }}</span></p>
                            <!-- Other dashboard content goes here -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
