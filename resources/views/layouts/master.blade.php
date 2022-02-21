<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
   @include('partials.styles')
</head>
<body>
    
<div class="wrapper">
      <!-- Navbar start -->


<!-- Navbar ends -->

<!-- sidebar+content starts -->
@include('partials.nav')
 @yield('content')

<!-- sidebar+content ends -->


 @include('partials.footer')

</div>

@include('partials.scripts')
</body>
</html>