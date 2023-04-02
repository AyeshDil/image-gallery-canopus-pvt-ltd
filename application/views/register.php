<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Register</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body style="background-color: #bdc3c7;">

  <section style="border: 1px solid red; height: 100vh;">
    <div class="container mt-2" style="border: 1px solid red;">
      <div class="row">
        <!-- image -->
        <div class="col col-lg-12" style="border: 1px solid blue;">
          <img style="width: 100%; height: 100px; object-fit: cover;" src="https://cdn.pixabay.com/photo/2017/03/22/21/12/images-2166471_960_720.jpg" alt="">
        </div>
      </div>

      <div class="row d-flex justify-content-center">
        <!-- Register form -->
        <div class="col col-lg-6 row align-items-center" style="border: 1px solid blue; height: 75vh;">
          
        <?php echo form_open('Register/registerUser'); ?>
        
        <form method="post" action="">
            <div class="d-flex justify-content-center">
              <h1>Register</h1>
            </div>
            <div class="row mt-3">
              <div class="col col-lg-6">
                <label for="fname" class="form-label "><strong>First Name</strong> </label>
                <input type="text" class="form-control" id="fname">
              </div>
              <div class="col col-lg-6">
                <label for="lame" class="form-label "><strong>Last Name</strong> </label>
                <input type="text" class="form-control" id="lname">
              </div>
            </div>


            <div class="mt-2">
              <label for="uname" class="form-label "><strong>User Name</strong> </label>
              <input type="text" class="form-control" id="uname">
            </div>

            <div class="mt-2">
              <label for="email" class="form-label "><strong>Email address</strong> </label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>

            <div class="row mt-2">
              <div class="col col-lg-6">
                <label for="password" class="form-label"><strong>Password</strong> </label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="col col-lg-6">
                <label for="confirm-password" class="form-label"><strong>Confirm Password</strong> </label>
                <input type="password" class="form-control" id="confirm-password">
              </div>
            </div>

            <div class="mt-3 d-flex justify-content-center col-12">
              <button type="submit" class="btn btn-dark w-100">REGISTER</button>
            </div>
            <div class="mt-2">
              <p style="color: #393f81;">Already have an account?
                <a href="<?php echo base_url('index.php/Login'); ?>" style="color: #393f81;">
                  LOG IN
                </a>
              </p>
            </div>
          </form>

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