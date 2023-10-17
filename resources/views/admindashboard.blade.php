<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            overflow-x: hidden;
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
            background-color: #555;
        }

        /* Content container to push content to the right */
        .content {
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        /* Style for active link */
        .sidebar a.active {
            background-color: #555;
        }

        /* Add a border to the active link */
        .sidebar a.active {
            border-right: 3px solid #ffffff;
        }

        /* Style for the hamburger menu button */
        #sidebarCollapse {
            display: none; /* Initially hide the button on larger screens */
        }
        
        @media (max-width: 767px) {
            /* Hide the sidebar on screens smaller than 'md' */
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }

            /* Show the hamburger menu button on smaller screens */
            #sidebarCollapse {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                cursor: pointer;
                z-index: 1;
            }
        }
    </style>
</head>
<body>

<button class="btn btn-dark" id="sidebarCollapse">&#9776;</button>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar">
            <a href="{{route('dashboard')}}" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
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
        </nav>

        <!-- Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="content">
                <!-- Your content goes here -->
                @yield('content')
            </div>
        </main>

    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script>
    // Ensure the document is ready before executing the script
    $(document).ready(function () {
        // Add script to toggle sidebar visibility
        $('#sidebarCollapse').on('click', function () {
            $('.sidebar').toggleClass('active');
            $('.content').toggleClass('active');
        });
    });
</script>

</body>
</html>
