<!DOCTYPE html>
<html lang="en">
<head>
  @include('inc.css')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  @include('inc.header')

  {{ $slot }}

@include('inc.footer')

</body>
</html>
