<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>{{ $title }}</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
        <div class="container">
            <p class="navbar-brand mb-0 h1" href="">Kasir</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link{{ ($title === "Home")?' active':'' }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "About")?' active':'' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === "Contact Us")?' active':'' }}" href="/contact">Contact Us</a>
                    </li>
                </ul>
                <button class="btn btn-dark" type="submit"><a href="/login"  class="text-decoration-none text-white">Login</a></button>
            </div>
        </div>
    </nav>
    @yield('containersatu')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>