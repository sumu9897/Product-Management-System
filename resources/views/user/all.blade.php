@extends('admindashboard')

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
            <div class="alert alert-success w-100">{{ session('success') }}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger w-100">{{ session('error') }}</div>
        @endif

        <table class="table table-striped">
            <thead style="text-align: center">
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="searchResults">
                @if(!empty($users))
                    @foreach($users as $user)
                        <tr style="text-align: center">
                            <td scope="row">{{ $user->user_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->department }}</td>
                            <td>
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('user.show', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Show</a>
                                <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No employees found.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            {{ $users->render() }}
        </div>
        
    </div>

    <script>
        // var timeout;

        // document.getElementById('searchInput').addEventListener('input', function() {
        //     clearTimeout(timeout);
        //     timeout = setTimeout(function() {
        //         document.getElementById('searchForm').submit();
        //     }, 500);
        // });
    </script>

