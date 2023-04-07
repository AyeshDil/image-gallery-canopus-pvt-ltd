<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Register - Image Gallery</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
</head>

<body style="background-color: #F1F0EA; font-family: 'Montserrat', sans-serif;">

  <section class="p-5">
    <div class="container mt-5">
      <div class="row" style="background-color: #474448; color: white; border-radius: 30px;">
        <!-- Register Form -->
        <div class="col col-lg-6">
          <div class=" d-flex justify-content-center">
            <!-- Register form -->
            <div class="col col-lg-12 row align-items-center" style=" height: 75vh;">

              <?php echo validation_errors(); ?>
              <?php echo form_open('Register/registerUser'); ?>

              <!-- <form method="post" action=""> -->
              <div class="d-flex justify-content-center">
                <h1>Register</h1>
              </div>

              <?php
              if ($this->session->flashdata('unsucecess')) {
                echo '
                  <div class="alert alert-danger" role="alert">
                  <i class="fa-solid fa-circle-info"></i> &nbsp' .
                  $this->session->flashdata('unsucecess')
                  . '</div>
                ';
              }
              ?>

              <div class="row mt-3">
                <div class="col col-lg-6">
                  <label for="fname" class="form-label ">First Name </label>&nbsp;<span style="color:red">*</span>
                  <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="col col-lg-6">
                  <label for="lame" class="form-label ">Last Name</label>&nbsp;<span style="color:red">*</span>
                  <input type="text" class="form-control" id="lname" name="lname">
                </div>
              </div>

              <div class="mt-2">
                <label for="uname" class="form-label ">User Name </label>&nbsp;<span style="color:red">*</span>
                <input type="text" class="form-control" id="uname" name="uname">
              </div>

              <div class="mt-2">
                <label for="email" class="form-label ">Email address </label>&nbsp;<span style="color:red">*</span>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
              </div>

              <div class="row mt-2">
                <div class="col col-lg-6">
                  <label for="password" class="form-label">Password</label>&nbsp;<span style="color:red">*</span>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col col-lg-6">
                  <label for="confpassword" class="form-label">Confirm Password</label>&nbsp;<span style="color:red">*</span>
                  <input type="password" class="form-control" id="confpassword" name="confpassword">
                </div>
              </div>

              <div class="mt-3 d-flex justify-content-center col-12">
                <button type="submit" class="btn btn-dark w-100">REGISTER</button>
              </div>
              <div class="mt-2">
                <p style="color: white;">Already have an account?
                  <a href="<?php echo base_url('index.php/Login'); ?>" style="color: whitesmoke;">
                    LOG IN
                  </a>
                </p>
              </div>
              <!-- </form> -->

              <?php echo form_close() ?>

            </div>
          </div>
        </div>

        <!-- image -->
        <div class="col col-lg-6 p-0">
          <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 0 30px 30px 0;" src="https://images.pexels.com/photos/69903/pexels-photo-69903.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>

</body>

</html>