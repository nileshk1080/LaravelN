<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" 
    href="<?php echo url('assets/css/bootstrap.min.css'); ?>">
    <title>Sign Up !</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@include('layouts.navbar2')

</head>
<body>
    <div class="frm">
    <h1>Sign Up !</h1>
    
    <form action="signUpUser" method="post" class="form-group">
        @csrf

        <label for="username">Username</label>
        <input type="text" name="username" class="form-control"><br>

        <label for="age">Age</label>
        <input type="text" name="age" class="form-control"><br>  

        <label for="password">Password</label>   
        <input type="text" name="password" class="form-control"><br>

        <label for="role">Role</label>
        <select name="role" class="form-control">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select><br><br>
        <input type="submit" class="btn btn-primary"><br>
    </form>
    </div>

</body>
</html>