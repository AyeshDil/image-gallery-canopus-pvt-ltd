<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Upload</title>

  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
  <div style="border: 1px solid red;">

 
  <?php echo form_open_multipart('upload/do_upload');?>

      <div class="container">
        <div class="row">
          <h1>Upload Your Photo</h1>
        </div>
        <div class="row">
          <div class="col col-lg-6">
            <div class="input-group mb-3">
              <input name="uploadedfile" onchange="loadImg(this);" type="file" class="form-control" id="inputGroupFile02">
            </div>
            <div>
              <img src="#" alt="" id="selected-img">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col col-lg-6">
            <div class="mb-3">
              <label for="caption" class="form-label">Caption</label>
              <textarea name="caption" class="form-control" id="caption" rows="3"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-lg-6">
            <div class="mb-3">
              <label for="tags" class="form-label">Tags</label>
              <textarea name="tags" class="form-control" id="tags" rows="2" placeholder="Car, Audi, SUV"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-lg-12">
            <button type="submit" class="btn btn-primary w-25">
              <i class="fa-solid fa-upload"></i>
              Upload
            </button>
          </div>
        </div>
      </div>

    

  </div>
  </form>
  </div>




  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>

  <script src="./js/upload.js"></script>
</body>

</html>