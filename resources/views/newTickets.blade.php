<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.navbar2')
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>New Tickets</title>

</head>
<body>
    <div class="main-content">
    <div>@include('layouts.tickettable2', ['tickets' => $tickets])</div>
    </div>
</body>
</html>