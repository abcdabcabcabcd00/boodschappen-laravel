<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@next-5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/groceries">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/groceries/create">Create</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@next-5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer="defer"></script>
</body>
</html>
