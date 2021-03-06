
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SI &mdash; Akademik</title>

  @include('templates/includes/style')
  @stack('style')
  <style>
    .hilang{
      display: none !important;
    }
  </style>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      @include('templates/includes/header')
      @include('templates/includes/sidebar')
      
      <div class="info" data-flashdata="{{session('info')}}"></div>
      <div class="gagal" data-flashdata="{{session('gagal')}}"></div>
      <div class="sukses" data-flashdata="{{session('sukses')}}"></div>
      <div class="warning" data-flashdata="{{session('warning')}}"></div>
      
      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Develop By <a href="#">Riway Restu Islami Yudha</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  @stack('before-script')
  @include('templates/includes/script')
  @stack('after-script')
</body>
</html>