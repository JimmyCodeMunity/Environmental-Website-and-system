<?php
@include('connection.php');
@include('includes/usernav.php');

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
			<div class="row">
				<div class="col-lg-6">
					<img src="assets/img/leaf.png">
				</div>
				<div class="col-lg-6">
					<h1 style="color: #8fc04e;">Welcome <?php echo $_SESSION['user_name']?></h1>
					<h1>Lets keep the environment clean</h1>
					<h2 style="color: #8fc04e;">"The earth is what we all have in common.” </h2>
					<p>—Wendell Berry</p>

					
			<a href="find.php" class="btn btn-success btn-lg"><i class="fa fa-search"></i> Find Gardener</a>
		</div>
	</div>

</body>
</html>