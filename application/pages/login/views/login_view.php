<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMDES | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>SIMDES</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>


        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button class="btn btn-primary btn-block" id="bt-login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>

  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/js/adminlte.min.js"></script>

<script src="<?= base_url()?>assets/js/md5.min.js"></script>

<script> 

    $(document).ready(function() { 
      $('#bt-login').on('click',function(e){
 
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        if (!username || !password) {
          alert ('Username dan password tidak boleh kosong !');
        } else {
          var url = "<?= base_url('login/cek'); ?>";
          var data = {user: username, pass: md5(password)};
          $.post( url, data, function( resp ) {
            if(resp.status === 'sukses'){

              setTimeout(function(){
              window.location.replace('dashboard')
               }, 1000);
              
            }else{
              alert('Login gagal, pastikan username dan password benar !');

            }
            
          }, "json");
        }
        
      })
    })
</script>
</body>
</html>

