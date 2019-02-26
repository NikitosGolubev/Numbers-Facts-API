<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.core.meta')

    <title>@yield('title')</title>
    <meta name='description' content="@yield('page-description')" />

    @include('layouts.core.default-css')

    @yield('head-tags')
</head>
<body class='page-body'>
    @include('layouts.core.header')

    <main>
        @yield('main')
    </main>

    <footer>
        @yield('footer')
    </footer>

    @include('layouts.core.default-js')

    @yield('scripts')
</body>
</html>
