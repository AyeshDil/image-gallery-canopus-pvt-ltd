<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link rel="stylesheet" href="./style/home.css">
</head>

<body>

	<!-- Disable Url routing and redirect to the login page-->
	<?php
	if (!$this->session->userdata('logged_in')) {
		redirect('login');
	}
	?>


	<!-- Scroll nav -->
	<nav class="nav navbar-expand-lg bg-dark fixed-top rounded-bottom" id="small-nav" style="height: 75px;">
		<div class="container " style="border: 1px solid blue;">
			<span class=" p-2 d-flex flex-row-reverse" style="border: 1px solid green; ">
				<a href="<?php echo base_url('index.php/Login/logoutUser') ?>">Logout</a>
				<a class="navbar-brand  m-2" href="#">
					<img style="border-radius: 50%;" src="https://img.freepik.com/free-vector/colourful-illustration-programmer-working_23-2148281410.jpg?w=740&t=st=1680410983~exp=1680411583~hmac=c0014abfc6d9a9f2bc88761878b79d73f9a99fc9956560514674ec64fc9f1c74" alt="" width="40" height="40">
				</a>
				<!-- user Name -->
				<div class="d-flex align-items-center mt-3">
					<p style="color: white;">
						<?php echo $this->session->userdata('fname') ?>
					</p>
				</div>

				<button class="btn btn-success m-2" type="button">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
				<button class="btn btn-primary m-2">
					<i class="fa-solid fa-upload"></i>
				</button>
			</span>
		</div>
	</nav>

	<div class="bg-dark" style="height: 75px;"></div>

	<!-- second nav -->
	<nav class="bg-dark p-3 sub-nav-bar d-none d-lg-block rounded-bottom">
		<div class="container" style="border: 1px solid red; height: auto;">

			<div class="row">
				<div class="container d-flex p-2">
					<div class="col col-lg-6 p-2" style="border: 1px solid blue; height: 50px;">
						<input type="text" class="form-control h-100" id="search-caption" placeholder="Search by caption">
					</div>
					<div class="col col-lg-4 p-2" style="border: 1px solid blue; height: 50px;">
						<div class="dropdown w-100 h-100">
							<button class="btn btn-secondary dropdown-toggle w-100 h-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Tags
							</button>
							<ul class="dropdown-menu center w-100">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</div>
					</div>
					<div class="col col-lg-2 p-2 " style="border: 1px solid blue; height: 50px;">
						<button class="btn btn-success w-100 h-100" type="button">
							<i class="fa-solid fa-magnifying-glass"></i>
							Search
						</button>
					</div>
				</div>
			</div>

			<!-- Upload btn area -->
			<div class="row w-100 p-2 justify-content-center" style="border: 1px solid green;">
				<!-- <div class=" w-100 d-flex justify-content-center">
					<button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#upload-modal">
						<i class="fa-solid fa-upload"></i>
						Upload
					</button>
				</div> -->

				<a href="<?php echo base_url('index.php/Upload'); ?>" class=" w-100 d-flex justify-content-center">
					<button type="button" class="btn btn-primary w-25">
						<i class="fa-solid fa-upload"></i>
						Upload
					</button>
				</a>

			</div>
		</div>
	</nav>

	<!-- Upload modal -->
	<!--<div class="modal fade" id="upload-modal" tabindex="-1" aria-labelledby="upload-modal-lable" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					
				<?php include './upload.php'; ?>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>-->


	<!-- pagination -->
	<div class="container mt-3">
		<nav aria-label="Page navigation example ">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
	</div>

	<!-- Image Section -->
	<div class="container">
		<div class="row" style="border: 1px solid red;">
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>

			<?php
			// $this->load->collator('');

			
			foreach ($my_results as $row) {
				echo '<div class="col col-lg-3 display-area d-flex justify-content-center" style="border: 1px solid blue; height: 200px;">
				<img class="h-100" src="data:image/jpeg;base64,'.base64_encode($row['image']) .'" />
				</div>';
		}
		




			// foreach ($response as $display_data) {
			// 	echo '<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;">' . $this->$display_data->image_data('image') . '</div>';
			// }
			?>


		</div>

		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>

	</div>
	<div style="height: 500px;">

	</div>




	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>


	<script src="./js/home.js"></script>
</body>

</html>