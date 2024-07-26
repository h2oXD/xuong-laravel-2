<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('client.layouts.partials.css')

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            @include('client.layouts.partials.header-top')

            @include('client.layouts.partials.header-nav')
        </header>

        @yield('content')

        <footer class="site-footer border-top">
            @include('client.layouts.partials.footer')
        </footer>
    </div>

    @include('client.layouts.partials.js')


</body>

</html>
