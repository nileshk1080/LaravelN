<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    @include('layouts.navbar2')

    @if(session('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
    @endif

<div class="pad">
    <form action="getAllTickets" method="get">
        <button href="" class="btn btn-success" type="submit">VIEW Tickets</button>
    </form><br><br>

    <form action="addTicketPage" method="get">
        <button href="" class="btn btn-primary" type="submit">Raise Ticket</button>
    </form>
</div>

</body>
</html>