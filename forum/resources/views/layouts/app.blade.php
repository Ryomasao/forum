@include('../components/header')
<body>
    @include('../components/content-header')
    @include('../components/side-menu')
    @yield('content')
    @include('../components/footer')
</body>
</html>
