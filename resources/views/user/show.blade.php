@extends('admindashboard')
<div class="content">

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Employee</h3>
        <a class="btn btn-success btn-sm" href="{{ route('user.all') }}">List Employee</a>
        
    </div>

    <div class="form-group">
        <label>Employee Name</label>
        <input type="text" name="ename" class="form-control" value="{{ $user->ename }}" disabled>
    </div>
    <div class="form-group">
        <label>Eployee Id</label>
        <input type="text" name="eid" class="form-control" value="{{ $user->eid }}" disabled>
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



    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Edit</a>
</div>
