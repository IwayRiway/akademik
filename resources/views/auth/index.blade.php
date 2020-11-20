<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SI &mdash; Akademik</title>

  @include('templates.includes.style')
  <style>
    /* .login-brand{
      width: 110px;
      border: 10px solid #4458eb;
      border-radius: 100%;
    } */
  </style>
</head>

<body>
  <div id="app">
        <div class="sukses" data-flashdata="{{session('sukses')}}"></div>
        <div class="gagal" data-flashdata="{{session('gagal')}}"></div>
        <div class="info" data-flashdata="{{session('info')}}"></div>
        <div class="warning" data-flashdata="{{session('warning')}}"></div>

      <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{asset('assets/img/logo.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="{{route('login.store')}}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; IwayRiway 2020 - {{date('Y')}}
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>

  @stack('before-scripts')
  @include('templates.includes.script')
  @stack('after-scripts')
</body>
</html>
