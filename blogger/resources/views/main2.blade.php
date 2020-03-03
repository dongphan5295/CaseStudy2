<!DOCTYPE html>
<html lang="en">
  <head>
    @include('dashboard.head')
  </head>

  <body>
    @include('dashboard.navbar')
    <div class="main-content">

    @include('dashboard.nav')
    @include('dashboard.message')

      {{-- @include('dashboard.header') --}}

      @yield('content')

      @include('dashboard.footer')
      </div>

     {{-- @include('dashboard.js') --}}
     @include('partials.javascript')

    @yield('scripts')

  </body>
</html>
