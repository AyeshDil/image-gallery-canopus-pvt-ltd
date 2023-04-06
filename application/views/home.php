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

<body style="background-color: #F1F0EA;">

	<!-- Disable Url routing and redirect to the login page-->
	<?php
	if (!$this->session->userdata('logged_in')) {
		redirect('login');
	}

	$pagination = $this->load->get_var('pagination');
	?>


	<!-- Fixed nav -->
	<nav class="nav navbar-expand-lg  fixed-top rounded-bottom" id="small-nav" style="height: 75px; background-color: #474448;">
		<div class="container " style="border: 1px solid blue;">
			<span class=" p-2 d-flex flex-row-reverse" style="border: 1px solid green; ">

				<a class="navbar-brand  m-2" href="#">
					<img style="border-radius: 50%;" 
					src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" 
					alt="user basic profile picture" 
					width="40" height="40">
				</a>
				<!-- user Name -->
				<div class="d-flex align-items-center mt-2">
					<p style="color: white;">
						<?php echo $this->session->userdata('fname') ?>
					</p>
				</div>
				<a data-bs-toggle="modal" data-bs-target="#logout_modal" class="nav-link" href="">
					<button class="btn btn-danger m-2" type="button">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
					</button>
				</a>



				<a class="nav-link" href="#search">
					<button class="btn btn-success m-2" type="button">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
				</a>

				<a class="nav-link" href="<?php echo base_url('index.php/Upload'); ?>">
					<button class="btn btn-primary m-2">
						<i class="fa-solid fa-upload"></i>
					</button>
				</a>

			</span>
		</div>
	</nav>

	<div id="search" class="bg-dark" style="height: 75px; background-color: #474448;" data-bs-spy="scroll" data-bs-target="#search" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"></div>

	<!-- second nav -->
	<nav class="p-3 sub-nav-bar d-none d-lg-block rounded-bottom" style="background-color: #474448;">
		<div class="container" style="border: 1px solid red; height: auto;">

			<div class="row">

				<form action="<?php echo base_url('index.php/Home/searchByCaptionOrID') ?>" method="get">
					<div class="container d-flex p-2 col-lg-8">
						<div class="col col-lg-6 p-2" style="border: 1px solid blue; height: 50px;">
							<!--Search by caption  -->
							<input value="<?php if ($this->input->get('keyword')) {
															echo $this->input->get('keyword');
														} ?>" name="keyword" type="text" class="form-control h-100" id="keyword" placeholder="Search by caption">

						</div>

						<div class="col col-lg-2 p-2 " style="border: 1px solid blue; height: 50px;">
							<a href="">
								<button class="btn btn-success w-100 h-100" type="submit">
									<i class="fa-solid fa-magnifying-glass"></i>
									Search
								</button>
							</a>
						</div>

						<div class="col col-lg-4 p-2" style="border: 1px solid blue; height: 50px;">
							<div class="dropdown w-100 h-100">
								<a href="<?php echo base_url('index.php/Home'); ?>">
									<button class="btn btn-secondary w-100 h-100" type="button">
										Clear Search
									</button>
								</a>
								<!-- <ul class="dropdown-menu center w-100">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul> -->
							</div>
						</div>
					</div>
				</form>
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

	<!-- LogOut Confirmation Modal -->
	<div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">LogOut</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you sure you want to logout?
				</div>
				<div class="modal-footer">
					<a href="<?php echo base_url('index.php/Login/logoutUser') ?>">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
					</a>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				</div>
			</div>
		</div>
	</div>


	<!-- pagination -->
	<div class="container mt-3">
		<div class="row">
			<div class="col col-lg-12">
				<nav aria-label="Page navigation ">
					<?php echo $pagination;
					?>
				</nav>
			</div>
		</div>
	</div>



	<!-- Image Section -->
	<div class="container">
		<div class="row" style="border: 1px solid red;">
			<!-- <div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div>
			<div class="col col-lg-3" style="border: 1px solid blue; height: 200px;"></div> -->




			<?php foreach ($thumbnails as $thumbnail) : ?>

				<div class="col col-lg-3 display-area d-flex justify-content-center" style="border: 1px solid blue; height: 200px;">
					<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#img-model">
						<a href="<?php echo base_url('index.php/Imageview/index/' . $thumbnail['id']); ?>">
							<img onclick="load('<?php echo $thumbnail['id']; ?>');" id="<?php echo $thumbnail['id']; ?>" class="h-100 show-img" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($thumbnail['image']); ?>" />
						</a>
					</button>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

	<!-- Extra Space -->
	<div style="height: 700px;"></div>




	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>


	<script src="./js/home.js"></script>


	<script>
		function load(id) {
			console.log("trigred");
			// var imgId = document.getElementsByClassName('show-img').getAttribute('id')
			// console.log(id);
			<?php
			$data['id'] = $id;
			$this->load->view('imageview', $data);
			?>
		}

		$(function() {
			$('[data-bs-toggle="tooltip"]').tooltip()
		})
	</script>
</body>

</html>