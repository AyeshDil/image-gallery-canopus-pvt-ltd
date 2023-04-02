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
<!-- Scroll nav -->
<nav class="nav navbar-expand-lg bg-dark" id="small-nav">
		<div class="container " style="border: 1px solid blue;">
			<span class=" p-2 d-flex flex-row-reverse" style="border: 1px solid green; ">
				<a class="navbar-brand  m-2" href="#">
				<img style="border-radius: 50%;" src="https://img.freepik.com/free-vector/colourful-illustration-programmer-working_23-2148281410.jpg?w=740&t=st=1680410983~exp=1680411583~hmac=c0014abfc6d9a9f2bc88761878b79d73f9a99fc9956560514674ec64fc9f1c74" alt="" width="40" height="40">
			</a>
					<button class="btn btn-success m-2" type="button">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
					<button class="btn btn-primary m-2">
						<i class="fa-solid fa-upload"></i>
						</button>
			</span>
		</div>
	</nav>


	<!-- second nav -->
	<nav class="bg-dark p-3 sub-nav-bar d-none d-lg-block ">
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
				<button class="btn btn-primary w-25">
					<i class="fa-solid fa-upload"></i>
					Upload
				</button>
			</div>
		</div>
	</nav>

	



	<div style="height: 500px;">

	</div>




	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6b4fc80c6e.js" crossorigin="anonymous"></script>

	<script src="./js/home.js"></script>
</body>

</html>