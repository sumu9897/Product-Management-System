@extends('admindashboard')
<script>
    function toggleReturningDate() {
        var statusSelect = document.getElementById("status");
        var rdate = document.getElementById("returningDate");

        if (statusSelect.value === "active") {
            rdate.style.display = "none"; // Hide the input field
        } else {
            rdate.style.display = "block"; // Show the input field
        }
    }
</script>
<script>
    const dropdown = document.getElementById('product_serial');
    const selectedOptions = new Set();

    dropdown.addEventListener('change', function() {
        const selectedOption = dropdown.value;

        if (selectedOptions.has(selectedOption)) {
            // Option has already been selected, reset the dropdown to a default value
            dropdown.value = '';
        } else {
            // Add the selected option to the set
            selectedOptions.add(selectedOption);
        }
    });
</script>
<div class="content">

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Product</h3>
        <button onclick="goBack()">Go Back</button>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
        

    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('assign.all') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Product Serial Number</label>
            
                <input type="text" class="form-control" name="product_serial" value="{{ $assign->product_serial }}" disabled>
                
           
                @if($errors->has('product_serial'))
                    <span class="error invalid-feedback"> {{ $errors->first('product_serial') }} </span>
                @endif
        </div>
        <div class="form-group">
            <label>Employee Id</label>
            <input  name="user_id" class="form-control" value="{{ $assign->user_id }}" disabled>
        </div>

        <div class="form-group">
            <label>Assign Date</label>
            <input  name="adate" class="form-control" value="{{ $assign->adate }}" disabled>
        </div>
       

        <label>Status</label>
        <input  name="status" class="form-control" value="{{ $assign ->status}}" disabled>
        
    

        
        <div  >
            <label for="rdate">Returning Date</label>
            <input  name="rdate" class="form-control" value="{{ $assign->rdate }}" disabled>
        </div><br><br>

        <button type="submit" class="btn btn-primary">Assign Product</button>
    </form>
    @include('layouts.footer')
</div>


