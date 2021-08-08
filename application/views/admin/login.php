<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin | Dashboard</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">

  <!-- Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="<?// base_url() ?>public/plugins/bootstrap/css/bootstrap.min.css"> -->
  
  <!-- AdminLTE Theme style -->
  <!-- <link rel="stylesheet" href="<?// base_url() ?>public/dist/css/adminlte.min.css"> -->

  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/toastr/toastr.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url() ?>public/dist/fonts/source-sans-pro-300,400,400i,700.css">

  <!-- My Style -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/styles.css">

</head>

<body class="hold-transition">
  
  <div class="wrapper">
    
      <div class="login-box">
        <div class="login-logo-box">
          <img src="<?= base_url('public/assets/img/logo-dilo-medan.png') ?>" alt="Logo Digital Innovation Lounge Medan (DILo Medan)" class="login-logo">
        </div>

        <div class="login-form">
          <h1 class="h1">
            Login Sistem Inventaris DILo Medan
          </h1>

          <form action="<?= base_url('login/action') ?>" method="post" class="form">

            <?php
              if ($this->session->flashdata('errorMessage')) {
                echo '<div class="alert alert-danger">';
                echo $this->session->flashdata('errorMessage');
                echo "</div>";
              }
              ?>
          
            <div class="form-group">
              <input type="email" name="email" class="form-input" id="email" placeholder="Email" required autocomplete="off">
              <label for="email" class="form-label">Email</label>
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-input" id="password" placeholder="Password" required autocomplete="off">
              <label for="password" class="form-label">Password</label>
            </div>
            
            <div class="form-group">
              <button class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>

        <!-- <p class="login-box-msg">Login Sistem Inventaris DILo Medan</p>

        <div class="login-content">
          <div class="">

            <form action="<?php ?>" method="post">
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <label for="email">Email</label>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
              </div>
            </form>

          </div>

        </div> -->
      
        <footer class="footer">
          Copyright &copy; 2021 <strong>Muhammad Aryo Muzakki</strong> | All rights reserved.
        </footer>
      
      </div>

  </div>

</body>

</html>