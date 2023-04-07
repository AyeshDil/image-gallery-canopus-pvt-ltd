<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Loging - Image Gallery</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

</head>

<body style="background-color: #F1F0EA; font-family: 'Montserrat', sans-serif;">
  <?php

  if ($this->session->userdata('logged_in')) {
    $_SESSION['logged_in'] = FALSE;
  }
  ?>
  <section class="p-5" style="border: 0 solid blue; ">
    <div class="container mt-5" style=" border-radius: 30px; background-color: #474448;">
      <div class="row ">

        <!-- image -->
        <div class="col col-lg-6 p-0">
          <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 30px 0 0 30px;" src="https://cdn.pixabay.com/photo/2017/03/22/21/12/images-2166471_960_720.jpg" alt="">
        </div>

        <!-- login form -->
        <div class="col col-lg-6 row align-items-center" style="height: 75vh; color: white; padding-left: 30px;">

          <?php echo validation_errors(); ?>
          <?php echo form_open('Login/loginUser'); ?>

          <div class="d-flex justify-content-center">
            <h1>Login</h1>
          </div>

          <?php
          if ($this->session->flashdata('sucecess')) {
            echo '
                  <div class="alert alert-primary" role="alert">
                  <i class="fa-solid fa-circle-info"></i> &nbsp' .
              $this->session->flashdata('sucecess')
              . '</div>
                ';
          } elseif ($this->session->flashdata('error')) {
            echo '
            <div class="alert alert-danger" role="alert">
            <i class="fa-solid fa-circle-info"></i> &nbsp' .
              $this->session->flashdata('error')
              . '</div>
          ';
          }
          ?>

          <div class="mt-3">
            <label for="email" class="form-label ">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">
              <p style="color: white;">We'll never share your email with anyone else.</p>
            </div>
          </div>
          <div class="mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mt-3 d-flex justify-content-center col-12">
            <button type="submit" class="btn btn-dark w-100" style="background-color: black;">LOGIN</button>
          </div>
          <div>
            <a class="small text-muted mt-2" href="#!" style="color: whitesmoke;">
              <p style="color: white;">Forgot password?</p>
            </a>
            <p style="color: white;">Don't have an account?
              <a href="<?php echo base_url('index.php/Register'); ?>" style="color: #F1F0EA;">
                Register here
              </a>
            </p>
            <div class="d-flex justify-content-end">
              <a href="#!" class="small " style="color: white;">
                <p>Terms of use.</p>
              </a> &nbsp;&nbsp;
              <a href="#!" class="small " style="color: white;">
                <p>Privacy policy</p>
              </a>&nbsp;&nbsp;
              <a href="<?php echo base_url('index.php/About'); ?>" class="small " style="color: white;">
                <p>About Project</p>
              </a>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>
</body>

</html>