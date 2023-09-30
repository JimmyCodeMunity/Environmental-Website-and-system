<?php
@include('connection.php');
@include('includes/usernav.php');
error_reporting(0);
$logid = $row['gard_id'];
$collect = "SELECT * FROM gardeners WHERE id='$logid'";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search</title>
  <script type="text/javascript">
    function hideSearch(){
      document.getElementById('cards').style.display='none';

      
    }
    function showRes(){
      document.getElementById('cards').style.display='flex';

    }
  </script>
</head>
<body class="text-center">
  <div class="container-fluid">
    <div class="container">
      <div class="text-center">
        
      <form class="form-a" action="" method="GET">
  
  <input type="text" class="form-control mb-5" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="search by email,name,location" onclick="hideSearch()">
  <button class="btn btn-search btn-primary" type="submit"><i class="fa fa-search"></i> search</button>
</div>
</form>



<div class="row pt-5" id="cards">

<?php
            if(isset($_GET['search'])){
              $filtervalues = $_GET['search'];
              $query = "SELECT * FROM gardeners WHERE CONCAT(id,username,email,location) LIKE '%$filtervalues%' ";
              $query_run = mysqli_query($conn,$query);

              if(mysqli_num_rows($query_run) > 0)
              {
                foreach($query_run as $items)
                {
                  ?>


<div class="col-md-3">
  <div class="card">
    
    
      <div class="card-image">
        <img src="garddash/demo/pages/forms/images/<?=$items['image']; ?>" alt="dp" class="img-a img-fluid" style="" width='100px' height='100px'>
      </div>
      <div class="namer card-title"><?php echo $items['username'];?></div>
      <div><strong> <?php echo $items['location']?></strong></div>
      <div>Experience: <?php echo $items['experience']?></div>
      <strong><div>Price from: <?php echo $items['price']?></div></strong>
      <p>Availability:<?php if($items['availability'] == 1){
          echo "<p class='text-success'>Available</p>";

        }
        else{
          echo "<p class='text-warning'>Busy</p>";
        }?></p>
    
    <div class="divider">
      <?php echo "<a class='btn btn-small btn-primary' href='view.php?id=".$items['id']."'>View</a>&nbsp;";?>
    </div>
  </div>
</div>
  <?php

                }

              }
              else
              {
                ?>
                <div class="alert alert-danger" role="alert">No records found</div>
                <br>
                <br>
                <a href="find.php" class="btn btn-success btn-lg"> Back to View All</a>

                <?php
              }
            }

            ?>
</div>
      
    </div>
  </div>

</body>
</html>