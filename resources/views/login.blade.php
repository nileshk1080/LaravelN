<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login !</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @include('layouts.navbar2')
</head>
<body>
     <div class="frm">
    
    <h1>Please Login !</h1>

<form action="<?php echo url('/loginUser'); ?>" method="post">
  @csrf
    
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    
</body>
</html>


