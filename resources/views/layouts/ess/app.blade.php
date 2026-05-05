<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ESS - HRMIS KC SDN BHD' }}</title>
</head>
<body>
    <header>
        <h1>HRMIS KC SDN BHD</h1>
        <p>Employee Self Service Portal</p>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
