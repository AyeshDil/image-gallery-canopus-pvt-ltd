<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Loging</title>
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

  <div style="border:1px solid blue; " class="text-center">
    <div class="container mt-5 d-flex justify-content-center">
      <div style="background-color: #474448; color: white; border-radius: 30px;" class="p-2">
        <div class="row">
          <div class="col col-lg-12 d-flex justify-content-center" style="">
            <img style="width: 500px; height: auto; border: 2px solid white; border-radius: 30px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($img_data['image']); ?>" alt="">
          </div>
        </div>
        <div class="row">
          <div style="max-width: 500px;" class="d-flex justify-content-center mt-3">
            <h5>Caption: </h5> &nbsp;&nbsp;
            <p><?php echo $img_data['caption'] ?></p>
          </div>
        </div>
        <div class="row">
          <div style="max-width: 500px;" class="d-flex justify-content-center">
            <h5>Tags: </h5> &nbsp;&nbsp;
            <p> <?php echo $img_data['tags'] ?></p>
          </div>
        </div>
        <div class="row">
          <div style="" class="d-flex justify-content-end mt-3">
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="delete-model" data-bs-target="#delete-model">DELETE</button> -->
            <!-- </a> -->
            <a href="javascript:history.back()">
              <button type="button" class="btn btn-success">
                < BACK
              </button>
            </a>



            &nbsp; &nbsp;
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal">
              DELETE
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete?
        </div>
        <div class="modal-footer">
          <a href="<?php echo base_url('index.php/Imageview/deleteImage/' . $img_data['property_id']); ?>">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
          </a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>




  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>
</body>

</html>