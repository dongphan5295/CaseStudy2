<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>

  <body>

    @include('partials.nav')

      {{-- @include('partials.messages') --}}

      @yield('content')

      @include('partials.footer')

     @include('partials.javascript')

    @yield('scripts')

  </body>
</html>
