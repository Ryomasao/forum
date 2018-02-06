@include('../components/header')
<body>
    @include('../components/content-header')
    <div class="app">
        @yield('content')
    </div>
    @include('../components/footer')
</body>
</html>
