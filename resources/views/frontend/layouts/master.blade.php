<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
          @yield('title', 'Ecommerce')
      
    </title>
   @include('frontend.partials.styles')
</head>
<body>
    
<div class="wrapper">
      <!-- Navbar start -->


<!-- Navbar ends -->

<!-- sidebar+content starts -->
@include('frontend.partials.nav')
 @yield('content')

<!-- sidebar+content ends -->


 @include('frontend.partials.footer')

</div>

@include('frontend.partials.scripts')
</body>
</html>