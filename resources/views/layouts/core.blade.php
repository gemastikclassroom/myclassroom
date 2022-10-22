@vite('resources/js/app.js')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Page</title>

    {{ vite_assets() }}
</head>

<body>
    @include("partials.navbar")
    @include("partials.beranda")
</body>

</html>