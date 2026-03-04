
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .btnr{
            margin : 1px 15px;
        }
        body{
                font-family: "Courier New" !important;
            }
    </style>

</head>
<body>
    
    <div>
    <nav class="navbar navbar-inverse nav">

        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/small-logo.svg') }}" class="nav-logo"></img>
            </a>
        </div>

        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo url('home'); ?>">Ticketing System</a>
        </div>

        <form class="navbar-brand">
        <input type="text" id="InputUser" placeholder="Search" >
        </form>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="newTickets">
                <i class="bi bi-bell" style="font-size:18px;"></i>
                    <span class="badge" style="background:red;">
                        @if(isset($newTicketCount))
                        {{ $newTicketCount }}
                        @endif
                    </span>
                </a>
            </li>
           
            <?php
                $user = Auth::user();
                if (isset($user)) {
                    echo '<li class="navbar-brand btnr">'.$user->Username.'</li>';

                echo '<li class="btnr">
                    <a href='.url('logout').'>
                    <span class="glyphicon glyphicon-user"></span> Logout</a>
                    </li>';
                }else{
                    echo '<li class="btnr">
                    <a href='.url('signUp').'>
                    <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                    </li>

                    <li class="btnr">
                    <a href='.url('login').'><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>';
                }
            ?>
            
        </ul>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>