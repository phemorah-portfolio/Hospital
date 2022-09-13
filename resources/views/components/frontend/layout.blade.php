<!DOCTYPE html>
<html lang="en">
<head>
  @include('user.inc.css')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('user.inc.header')

    {{ $slot }}

  @include('user.inc.footer')
  
</body>
</html>
