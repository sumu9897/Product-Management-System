@extends('admindashboard')

@section('content')
    <div class="content">
        <div class="d-flex justify-content-between mb-4">
            <h3>Employee List</h3>
            <form action="{{ route('user.all') }}" method="GET" id="searchForm">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search by name or ID" name="search" id="searchInput">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        @if(session()->has('success'))
            <label class="alert alert-success w-100">{{session('success')}}</label>
        @elseif(session()->has('error'))
            <label class="alert alert-danger w-100">{{session('error')}}</label>
        @endif

        <table class="table table-striped">
            <thead style="text-align: center">
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="searchResults">
                @foreach($users as $user)
                    <tr style="text-align: center">
                        <td>{{ $user->eid }}</td>
                        <td>{{ $user->ename }}</td>
                        <td>{{ $user->department }}</td>
                        <td>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Show</a>
                            <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            {{ $users->render() }}
        </div>
    </div>

    <script>
        var timeout;

        document.getElementById('searchInput').addEventListener('input', function() {
            //clearTimeout(timeout);

            // Delay the search by 500 milliseconds to avoid rapid firing of requests
            //timeout = setTimeout(function() {
             //   document.getElementById('searchForm').submit();
            //}, 500);
        });
    </script>
@endsection
