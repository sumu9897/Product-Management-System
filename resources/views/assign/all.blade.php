@extends('admindashboard')

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Assigns List</h3>
        <form action="{{ route('assign.all') }}" method="GET" id="searchForm">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search by name or ID" name="search" id="searchInput">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <button class="btn btn-primary btn-sm" onclick="downloadTable()">Download Table</button>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{ session('success') }}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{ session('error') }}</label>
    @endif

    <table class="table table-striped">
        <thead style="text-align: center">
            <th>Assign Product Id</th>
            <th>Employee ID</th>
            <th>Assign Date</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($assigns as $assign)
                @if($assign->status === 'active')
                    <tr style="text-align: center">
                        <td>{{ $assign->product_serial }}</td>
                        <td>{{ $assign->user_id }}</td>
                        <td>{{ $assign->adate }}</td>
                        <td>{{ $assign->status }}</td>
                        <td>
                            <a href="{{ route('assign.edit', ['id' => $assign->id]) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ route('assign.show', ['id' => $assign->id]) }}" class="btn btn-info btn-sm">Show</a>
                            <form action="{{ route('assign.delete', ['id' => $assign->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    @include('layouts.footer')
</div>

<script>
    function downloadTable() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Assigns List</title></head><body>');
        printWindow.document.write('<h3>Assigns List</h3>');
        printWindow.document.write(document.querySelector('.table').outerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
