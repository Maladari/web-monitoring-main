<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dd</title>
</head>

<body>
    @foreach ($stations as $s)
        <h1>{{ $s->nilai->id }}</h1>
    @endforeach
</body>

</html>
