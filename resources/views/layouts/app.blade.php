<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/pizza-menu.css') }}">
</head>
<body>
<header>
    <div class="container">
        <h1>Пицца Дэнни</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">О нас</a></li>
                <li class="nav-item"><a class="nav-link" href="/product/create">Сделать заказ</a></li>
                <li class="nav-item"><a class="nav-link" href="/product">Заказы готовятся</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container mt-4">
    @yield('content')
</main>

<footer class="mt-4">
    <div class="container">
        <p>&copy; {{ date('Y') }} Пицца Дэнни</p>
    </div>
</footer>
</body>
</html>
