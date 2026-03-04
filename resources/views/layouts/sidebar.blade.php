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

        <div class="sidebar">
            <div class="sidebar-item">
            <a class="navbar-brand text-white font-weight-bold " href="#">
                <span class="logo-circle">a</span>
            </a>
            </div>

            <button class="side-btn active menu">
                <i class="fa fa-columns"></i>
                <div class="submenu">
                        <a href="#">Add User</a>
                        <a href="#">View Users</a>
                    </div>  
            </button>

            <button class="side-btn menu">
                <i class="fa fa-user"></i>
                <div class="submenu">
                        <a href="#">Add User</a>
                        <a href="#">View Users</a>
                    </div>  
            </button>

            <button class="side-btn menu">
                <i class="fa fa-headset"></i>
                <div class="submenu">
                        <a href="#">Add User</a>
                        <a href="#">View Users</a>
                    </div>  
            </button>

            <button class="side-btn menu">
                <i class="fa fa-bullhorn"></i>
                <div class="submenu">
                        <a href="#">Add User</a>
                        <a href="#">View Users</a>
                    </div>  
            </button>
            
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>