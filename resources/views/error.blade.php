<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>
    @if ($errors->any())

        @foreach ($errors->all() as $error)

            {{ $error }} <br>

        @endforeach

    @endif
</body>
</html>