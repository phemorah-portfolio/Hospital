<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.inc.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.inc.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.inc.navbar')
        <!-- partial -->
        <div class="main-panel">
        	<div class="content-wrapper">
            {{ $slot }}
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.inc.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.inc.scripts')
  </body>
</html>