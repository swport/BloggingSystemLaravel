<!DOCTYPE html>
<html lang="en">
  <head>
            @include('partials._head')
  </head>
    <!--Bootstrap Navigation NAV-->
  <body>
        @include('partials._nav')
        <div class="container">
            @include('partials._messages')

            @yield('content')
            @yield('contact-phone')
            @include('partials._footer')

        </div>  <!--End of container-->
            @include('partials._javascript')
            @yield('scripts')
  </body>
</html>
