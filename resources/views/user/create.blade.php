@extends('admindashboard')

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Add Employee</h3>
        <a href="{{ route('user.all') }}" class="btn btn-secondary">All Employee List</a>
        <a href="{{ url()->previous() }}" class="btn btn-link">
            <i class="fa fa-arrow-circle-o-left"></i>
            <span>Back</span>
        </a>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success w-100">{{ session('success') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger w-100">{{ session('error') }}</div>
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="ename">Employee Name</label>
            <input required="required" type="text" name="name" id="name" class="form-control" placeholder="Employee Name">
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <input required="required" type="text" name="department" id="department" class="form-control" placeholder="Department">
        </div>

        <div class="form-group">
            <label for="number">Mobile Number</label>
            <input required="required" type="text" name="number" id="number" class="form-control" placeholder="Mobile Number">
        </div>

        <div class="form-group">
            <label for="jdate">Joining Date</label>
            <input required="required" type="date" name="jdate" id="jdate" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input required="required" type="email" name="email" id="email" class="form-control" placeholder="Employee Email" 
                   {{ old('email') ? 'value=' . old('email') : '' }} > 
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
    @include('layouts.footer')
</div>
