<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Loging</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

  <section style="border: 1px solid red; height: 100vh;">
    <div class="container mt-5" style="border: 1px solid red;">
      <div class="row m-3">

        <!-- image -->
        <div class="col col-lg-6" style="border: 1px solid blue; height: 75vh;">
          <img style="width: 100%; height: 100%; object-fit: cover;" src="https://cdn.pixabay.com/photo/2017/03/22/21/12/images-2166471_960_720.jpg" alt="">
        </div>

        <!-- login form -->
        <div class="col col-lg-6 row align-items-center" style="border: 1px solid blue; height: 75vh;">

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
          } elseif($this->session->flashdata('error')){
            echo '
            <div class="alert alert-danger" role="alert">
            <i class="fa-solid fa-circle-info"></i> &nbsp' .
        $this->session->flashdata('error')
        . '</div>
          ';
          }
          ?>

          <div class="mt-3">
            <label for="email" class="form-label "><strong>Email address</strong> </label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mt-3">
            <label for="password" class="form-label"><strong>Password</strong> </label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mt-3 d-flex justify-content-center col-12">
            <button type="submit" class="btn btn-dark w-100">LOGIN</button>
          </div>
          <div>
            <a class="small text-muted" href="#!">
              Forgot password?
            </a>
            <p style="color: #393f81;">Don't have an account?
              <a href="<?php echo base_url('index.php/Register'); ?>" style="color: #393f81;">
                Register here
              </a>
            </p>
            <div class="d-flex justify-content-end">
              <a href="#!" class="small text-muted">
                Terms of use.
              </a>
              <a href="#!" class="small text-muted">
                Privacy policy
              </a>
            </div>

          </div>
          <?php echo form_close() ?>
        </div>

      </div>
    </div>
  </section>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>
</body>

</html>