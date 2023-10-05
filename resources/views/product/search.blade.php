@extends('admindashboard')

<div class="content">
    

    @if ($products->isEmpty())
        <p>No products found for the serial number {{ $serialNumber }}.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Serial Number</th>
                    <th>Price</th>
                    <th>Model</th>
                    <th>Status</th>
                    <th>Document</th>
                    <th>SBU</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th>Purchase Date</th>
                    <th>Warranty/Guarantee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->serial }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->model }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            @if ($product->document)
                                <a href="{{ route('product.download', ['product' => $product->id]) }}" download="{{ $product->document }}">
                                    Download Document
                                </a>
                            @else
                                No document available
                            @endif
                        </td>
                        <td>{{ $product->SBU }}</td>
                        <td>{{ $product->capacity }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->Purchase_Date }}</td>
                        <td>{{ $product->P_WG }}</td>
                        <td>
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
