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

    <form action="{{ route('shift.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_serial"> Available Product Serial Number</label>
            <select name="product_serial" id="product_serial" class="form-control" onchange="updateProductName()">
                <option value="" disabled selected>Select Product</option>
                @foreach($products as $row)
                    @if ($row->status == 'stock')
                        <option value="{{ $row->serial }}" data-status="{{ $row->status }}">{{ $row->serial }} - {{ $row->name }} - {{ $row->SBU }}</option>
                    @endif
                @endforeach

                    {{-- @foreach($products as $row)
                        @if ($row->status == 'stock' || $row->status == 'inactive')
                            @foreach($inactiveAssigns as $inactiveAssign)
                            <!-- Display information about the inactive assignment -->
                                <p>{{ $inactiveAssign->product_serial }} - {{ $inactiveAssign->status }}</p>
                                <option value="{{ $row->serial }}" data-status="{{ $row->status }}">{{ $row->serial }} - {{ $row->name }}</option>
                            @endforeach
                            
                        @endif
                    @endforeach --}}

                    


            </select>
            @if($errors->has('product_serial'))
                <div class="error invalid-feedback">{{ $errors->first('product_serial') }}</div>
            @endif
            <span id="product_name">Unknown Product</span>
        </div>

        <script>
            function updateProductName() {
                var selectElement = document.getElementById('product_serial');
                var productNameElement = document.getElementById('product_name');
                var hiddenProductNameElement = document.getElementById('hidden_product_name');
  
                // Get the selected option
                var selectedOption = selectElement.options[selectElement.selectedIndex];

                // Update the span with the selected product's name
                productNameElement.textContent = selectedOption.text;

                // Set the value in the hidden input field
                hiddenProductNameElement.value = selectedOption.text;
            }
        </script>

        {{-- <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div> --}}

        {{-- <div class="form-group">
            <label for="serial">Serial:</label>
            <input type="text" name="serial" class="form-control" required>
        </div> --}}

        {{-- <div class="form-group">
            <label for="sbu">SBU:</label>
            <input type="text" name="SBU" class="form-control" value="{{ $product->SBU }}" disabled>
        </div> --}}

        <div class="form-group">
            <label for="Now_SBU">Now SBU:</label>
            <select required="required" name="Now_SBU" class="form-control">
                <option value="" disabled selected>Select SBU</option>
                <option value="JMI Group">JMI Group</option>
                <option value="JMIBL">JMIBL</option>
                <option value="JHL">JHL</option>
                <option value="JMEL">JMEL</option>
                <option value="JFL">JFL</option>
                <option value="JGL">JGL</option>
                <option value="JSL">JSL</option>
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
