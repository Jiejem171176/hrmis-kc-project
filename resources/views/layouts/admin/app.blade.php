<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin - HRMIS KC SDN BHD' }}</title>
</head>
<body>
    <header>
        <h1>HRMIS KC SDN BHD</h1>
        <p>Admin Portal</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
