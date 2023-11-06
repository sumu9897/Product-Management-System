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

    <form action="{{route('shift.update', ['id' => $shift->id])}}"method="POST">


        

        <div class="form-group">
            <label for="Now_SBU">Now SBU:</label>
            <select required="required" name="SBU" class="form-control">
                <option value="" disabled>Select Purchase SBU</option>
                <option value="JMEL" {{ $shift->Now_SBU == 'JMEL' ? 'selected' : '' }}>JMEL</option>

                <option value="JMI Group" {{ $shift->Now_SBU == 'JMI Group' ? 'selected' : '' }}>JMI Group</option>
                <option value="JMIBL" {{ $shift->Now_SBU == 'JMIBL' ? 'selected' : '' }}>JMIBL</option>
                <option value="JHL" {{ $shift->Now_SBU == 'JHL' ? 'selected' : '' }}>JHL</option>
                <option value="JFL" {{ $shift->Now_SBU == 'JFL' ? 'selected' : '' }}>JFL</option>
                <option value="JGL" {{ $shift->Now_SBU == 'JGL' ? 'selected' : '' }}>JGL</option>
                <option value="JSL" {{$shift->Now_SBU == 'JSL' ? 'selected' : '' }}>JSL</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Shift_Date">Shift Date:</label>
            <input type="date" name="Shift_Date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Shift Product</button>
    </form>
    
@include('layouts.footer')
</div>


