<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('includes.header')
    <!-- vendor css -->
    @include('includes.css')
  </head>

  <body>
    
    <div class="container">
        @include('includes.navbar')
        <!-- ########## START: MAIN PANEL ########## -->
        @yield('body-content')
        @include('includes.footer')
        <!-- ########## END: MAIN PANEL ########## -->
    </div>
    @include('includes.script')

  </body>
</html>