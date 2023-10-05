@extends('admindashboard')

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Assign Product</h3>
        <button onclick="goBack()">Go Back</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{ session('success') }}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{ session('error') }}</label>
    @endif

    <form action="{{ route('assign.update', ['id' => $assign->id]) }}" method="POST">
        @csrf
        @method('PUT') {{-- Use PUT method for update --}}

        <div class="form-group">
            <label>Product Serial Number</label>
            <select name="product_serial" id="product_serial" class="form-control">
                @foreach ($products as $row)
                    <option value="{{ $row->serial }}" @if($row->serial === $assign->product_serial) selected @endif>
                        {{ $row->serial }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>User Id</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($employees as $row)
                    <option value="{{ $row->eid }}" @if($row->eid === $assign->user_id) selected @endif>
                        {{ $row->eid }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Assign Date</label>
            <input type="date" name="adate" required="required" class="form-control" value="{{ $assign->adate }}">
        </div>

        <div class="form-group">
            <label>Return Date</label>
            <input type="date" name="rdate" required="required" class="form-control" value="{{ $assign->rdate }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Assign Product</button>
    </form>
</div>
