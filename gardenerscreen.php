<?php
@include('connection.php');
@include('includes/gardnav.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UserPage</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="text-center">
	<div class="container-fluid">
		<div class="container">
			<h1 style="color: #8fc04e;">Welcome <?php echo $_SESSION['gard_name']?></h1>
			<br>
			<a href="" class="btn btn-success btn-lg"><i class="fa fa-search"></i> View Bookings</a>

			<div class="row justify-content-center align-items-center d-flex my-5">
				


			<div class="col-lg-3 my-5">
				<a href="" class="card p-5" style="background-color: #8fc04e;">
					<div class="card-body">
						<h5>View Bookings <i class="fa fa-eye"></i> </h5>
					</div>
				</a>
			</div>

			<div class="col-lg-3 my-5">
				<a href="" class="card p-5" style="background-color: #8fc04e;">
					<div class="card-body">
						<h5>My Work<i class="fa fa-share"></i></h5>
					</div>
				</a>
			</div>

			<div class="col-lg-3 my-5">
				<a href="" class="card p-5" style="background-color: #8fc04e;">
					<div class="card-body">
						<h5>Edit Profile<i class="fa fa-user"></i></h5>
					</div>
				</a>
			</div>


			
			</div>
		</div>
	</div>

</body>
</html>