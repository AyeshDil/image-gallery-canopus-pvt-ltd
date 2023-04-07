<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Upload- Image Gallery</title>

  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

</head>

<body style="background-color: #F1F0EA; font-family: 'Roboto', sans-serif;">
  <?php
  if (!$this->session->userdata('logged_in')) {
    redirect('login');
  }
  ?>

  <div class="mt-5">

    <?php echo form_open_multipart('upload/do_upload'); ?>

    <div class="container d-flex justify-content-center">
      <div style=" background-color: #474448; color: white; border-radius: 30px;" class="col-lg-6 m-5 p-5">
        <div class="row">
          <h1 class="text-center">Upload Your Photo</h1>

          <div class="col col-lg-12 mt-3">
            <div class="input-group mb-3">
              <input name="uploadedfile" onchange="loadImg(this);" type="file" class="form-control" id="inputGroupFile02">
            </div>
          </div>
          <br>

          <div class="col col-lg-12">
            <div class="mb-3">
              <label for="caption" class="form-label">Caption</label>
              <textarea name="caption" class="form-control" id="caption" rows="3" placeholder="Type your caption..."></textarea>
            </div>
          </div>

          <div class="col col-lg-12">
            <div class="mb-3">
              <label for="tags" class="form-label">Tags</label>
              <textarea name="tags" class="form-control" id="tags" rows="2" placeholder="Car, Audi, SUV"></textarea>
            </div>
          </div>

          <div class="col col-lg-12 d-flex justify-content-center mt-4">
            <a href="javascript:history.back()">
              <button type="button" class="btn btn-success">
                < BACK </button>
            </a>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-primary w-50">
              <i class="fa-solid fa-upload"></i>
              Upload
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>

</body>

</html>