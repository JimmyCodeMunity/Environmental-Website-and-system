<?php
@include('connection.php');
@include('includes/usernav.php');
//$logid = $row['fundi_id'];
$collect = "SELECT * FROM gardeners WHERE status = 1";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Find</title>
</head>
<body class="finderbody text-center">
  <div class="container-fluid">
    <div class="container">
  <div class="s-bar">
  <a href="search.php" class="btn btn-primary btn-lg btn-get-started btn-rounded scrollto"><i class="bi bi-search"></i>  Search for gardener</a>
  
</div>

<div class="row pt-5" id="cards">

<?php
        
        $query_command = "SELECT * FROM gardeners";

      $query_res = $conn->query($query_command);
          if ($query_res->num_rows > 0){  
            $a=0;          
              while($row = $query_res->fetch_assoc()){
            $a++;
            
            ?>


  <div class="col-lg-3">
  <div class="card p-3">
    
    
      <div class="card-image">
        <img src="garddash/demo/pages/forms/images/<?=$row['image']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
      </div>
      <div class="namer card-title"><?php echo $row['username'];?></div>
      <div><strong> <?php echo $row['phone']?></strong></div>
      <div>Location: <?php echo $row['location']?></div>
      <strong><div>email: <?php echo $row['email']?></div></strong>
      <p>Status:<?php if($row['availability'] == 1){
          echo "<p class='text-success'>Available</hp>";

        }
        else{
          echo "<p class='text-warning'>Busy</p>";
        }?></p>
    
    <div class="divider">
      <?php echo "<a class='btn btn-small btn-primary' href='view.php?id=".$row['id']."'>View</a>&nbsp;";?>
    </div>
  </div>

</div>
  
  <?php
        }
      }

        ?>
</div>
 
  
</body>
</html>