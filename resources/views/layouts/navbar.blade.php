<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    
    
    <nav class="navbar custom-navbar navbar-expand-lg ">

        {{-- <a class="navbar-brand text-white font-weight-bold " href="#">
        <span class="logo-circle">a</span>
        </a> --}}
        <form class="form-inline ml-3">
        <input type="text" id="InputUser" placeholder="Search" class=" search-input">
        </form>

    

        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link env" href="#">
                    <i class="fa fa-envelope"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white position-relative" href="#">
                    <i class="fa fa-bell"></i>
                    <span class="notification-dot"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fa fa-user-circle"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <select class="nav-link dropdown-toggle " name="countries" id="countries">
                    <option class="dropdown-item custom-nav-dropdown"  value="USA">USA</option>
                    <option class="dropdown-item" value="India">India</option>
                </select>
            </li>
        </ul>
    </nav>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>