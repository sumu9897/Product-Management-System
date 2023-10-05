@extends('userlayout')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<style>
    /* Sidebar styles */
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        padding-top: 20px;
        color: white;
    }

    /* Sidebar links */
    .sidebar a {
        padding: 15px;
        text-decoration: none;
        font-size: 18px;
        color: white;
        display: block;
        transition: background-color 0.3s;
    }

    /* Change the color of links on hover */
    .sidebar a:hover {
        background-color: #555; /* Darker color on hover */
    }

    /* Content container to push content to the right */
    .content {
        margin-left: 250px;
        padding: 20px;
    }

    /* Style for active link */
    .sidebar a.active {
        background-color: #555;
    }

    /* Add a border to the active link */
    .sidebar a.active {
        border-right: 3px solid #ffffff;
    }
</style>

<body>
    <div class="sidebar">
        <a href="{{route('product.create')}}" class="{{ Request::is('product/create') ? 'active' : '' }}">ADD Product</a>
        <a href="{{route('product.all')}}" class="{{ Request::is('product/all') ? 'active' : '' }}">All Product</a>
        <a href="{{route('user.create')}}" class="{{ Request::is('user/create') ? 'active' : '' }}">ADD USER</a>
        <a href="{{route('user.all')}}" class="{{ Request::is('user/all') ? 'active' : '' }}">Employee Details</a>
        <a href="{{route('assign.create')}}" class="{{ Request::is('assign/create') ? 'active' : '' }}">Assign Product</a>
        <a href="{{route('assign.all')}}" class="{{ Request::is('assign/all') ? 'active' : '' }}">Assigned All product</a>
        <a href="{{''}}" class="{{ Request::is('history') ? 'active' : '' }}">History</a>

        <!-- Logout Link -->
        
           <a class="text-danger" href="{{ route('logout') }}">Logout</a>

           
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    @section('content')
        <!-- Your content goes here -->
    @endsection
</body>
