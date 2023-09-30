<?php
@include('connection.php');

@include('includes/usernav.php');

$id = $_GET['id'];

$select = "SELECT * FROM gardeners WHERE id = '$id'";
$res = mysqli_query($conn,$select);
$row = mysqli_fetch_array($res);
$selected = $row['email'];

$select2 = "SELECT * FROM posts WHERE sender='$selected'";
$res2 = mysqli_query($conn,$select2);
$row2 = mysqli_fetch_array($res2);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View</title>
</head>
<body class="text-white">
	<div class="container-fluid">
		<div class="container">
			<h5 class="text-white">View/<?php echo $selected?></h5>


			<h3 class="text-white">Projects</h3>



			<div class="row">
				<div class="col-md-8">
				<img src="garddash/demo/pages/forms/images/<?=$row2['image1']; ?>" style="width: 100%;height: 600px;" alt="user" class="user">
			</div>
			<div class="col-md-4">
				<h4>Name:<?php echo $row['username']?></h4>
				<h4>Email:<?php echo $row['email']?></h4>
				<h4>Location:<?php echo $row['location']?></h4>
				<h4>Price:<?php echo $row['price']?></h4>
				<h4>Availability:<?php if($row['availability'] == 1){
					echo "<h4 class='text-success'>Available</h4>";

				}
				else{
					echo "<h4 class='text-warning'>Busy</h4>";
				}?></h4>
				<?php if($row['availability'] == 1){
					echo "<a class='btn btn-small btn-primary' href='booking.php?id=".$row['id']."'>Book</a>&nbsp;";

				}
				else{
					echo "<button class='btn btn-warning'>Busy</button>";
				}?>
				
			</div>
			
		</div>
	</div>

</body>
</html>