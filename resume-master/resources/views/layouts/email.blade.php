<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name').' Email')</title>
    @yield('css')
</head>
<body>

<section>
    <div class="container">
        @yield('content')
    </div>
</section>

</body>
</html>
