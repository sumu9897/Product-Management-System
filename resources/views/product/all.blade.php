@extends('admindashboard')

    <div class="content">
        <div class="d-flex justify-content-between mb-4">
            <h3>Products List</h3>
            <a class="btn btn-success btn-sm" href="{{ route('product.create') }}">Create New</a>
            <!--<a href="{{ url()->previous() }}">
                <i class="fa fa-arrow-circle-o-left"></i>
                <span>Back</span>
                <button onclick="printTable()">Print</button>
                <a href="{{ route('products.download') }}" class="btn btn-primary btn-sm">Download</a>-->
            </a>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success w-100">{{ session('success') }}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger w-100">{{ session('error') }}</div>
        @endif

        <form action="{{ route('product.all') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by name or ID" name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
        

        <table class="table table-striped">
            <thead style="text-align: center">
                <tr>
                    <th>Product Name</th>
                    <th>Product Model</th>
                    <th>Product Serial Number</th>
                    <th>Purchase SBU</th>
                    <th>Product Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr style="text-align: center">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->serial }}</td>
                        <td>{{ $product->SBU }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-info btn-sm">Show</a>
                            <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="content">
    
            <p>Total Products: {{ $productCount }}</p>
        
            <!-- Rest of your product.all view code -->
        </div>

        <div class="d-flex justify-content-between">
            {{ $products->render() }}
        </div>
        @include('layouts.footer')
    </div>

<script>
        function printTable() {
        // Open the print dialog
        window.print();
    }
</script>
