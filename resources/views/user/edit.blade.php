@extends('admindashboard')
<div class="content">

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Employee</h3>
        <a class="btn btn-success btn-sm" href="{{ route('user.all') }}">List Employee</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="ename" required="required" class="form-control" placeholder="Enter Employee name" value="{{ $user->ename }}">
        </div>
        <div class="form-group">
            <label>Employee Id </label>
            <input type="text" name="eid" class="form-control" value="{{ $user->eid }}" disabled>
        <div class="form-group">
            <label>Employee E-mail</label>
            <input type="text" name="email" required="required" class="form-control" placeholder="Enter Employee Email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" required="required" class="form-control" placeholder="Enter Department Name" value="{{ $user->department }}">
        </div>

        <div class="form-group">
            <label>Mobile Number</label>
            <input type="text" name="number" required="required" class="form-control" placeholder="Update Mobile Number" value="{{ $user->number }}">
        </div>


        <div class="form-group">
            <label>Joining Date</label>
            <input type="date" name="jdate" required="required"  class="form-control" value = "{{ $user->jdate }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
