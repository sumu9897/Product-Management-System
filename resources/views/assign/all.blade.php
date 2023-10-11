@extends('admindashboard')

<div class="content">
    <div class="d-flex justify-content-between mb-4">
        <h3>Assigns List</h3>
        <a class="btn btn-success btn-sm" href="{{ route('assign.create') }}">Create New</a>
        <!--<button onclick="goBack()">Go Back</button>
       <button onclick="downloadTable()">Download</button>-->
        <button onclick="printTable()">Print</button>
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
            @endforeach
        </tbody>
    </table>

    @include('layouts.footer')
</div>

<script>
  //  function goBack() {
  //      window.history.back();
   // }

    //function downloadTable() {
        // Logic for downloading the table, you can use a library like jsPDF or others
        // Example using jsPDF:
        //var doc = new jsPDF();
        //doc.autoTable({ html: 'table' });
        //doc.save('assigns_table.pdf');
  //  }

    function printTable() {
        // Open the print dialog
        window.print();
    }
</script>
