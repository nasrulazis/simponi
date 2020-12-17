<!doctype html>
<html lang="en">
  @include ('layout.header')
  <body>
    @include ('layout.navbar')
    @yield('container')
    @include ('layout.footer')
    @include('sweetalert::alert')
  </body>
</html>