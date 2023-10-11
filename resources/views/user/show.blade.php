@extends('admindashboard')
<div class="content">

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Employee</h3>
        <a class="btn btn-success btn-sm" href="{{ route('user.all') }}">List Employee</a>
        
    </div>

    <div class="form-group">
        <label>Employee Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
    </div>
    <div class="form-group">
        <label>Eployee Id</label>
        <input type="text" name="user_id" class="form-control" value="{{ $user->user_id }}" disabled>
    </div>
    <div class="form-group">
        <label>Department</label>
        <input type="text" name="department" class="form-control" value="{{ $user->department }}" disabled>
    </div>

    <div class="form-group">
        <label>Mobile Number</label>
        <input type="text" name="number" class="form-control" value="{{ $user->number }}" disabled>
    </div>
    <div class="form-group">
        <label>Emplpoyee E-Mail</label>
        <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
    </div>

    <div class="form-group">
        <label>Joining Date</label>
        <input type="date" name="jdate" class="form-control" value="{{ $user->jdate }}" disabled>
    </div>
    <div class="form-group">
        <span class="info-box-text text-center text-muted">Role</span>
        <span class="info-box-number text-center text-muted mb-0">{{ $user->name }}</span>
    </div>

    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Edit</a>
    @include('layouts.footer')
</div>
