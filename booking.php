<?php
@include('includes/usernav.php');
@include 'connection.php';

error_reporting(1);

if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($conn,"select * from gardeners where id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $serv=$row['apartment_name'];
    $sprice = $row['apartment_price'];
    
  }else{
    header('serv.php');
    die();
  }
}
$servselect = "SELECT * services";
$services = array();





if(isset($_POST['submit'])){

   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   
   $date = mysqli_real_escape_string($conn, $_POST['date']);
   $uemail = $_POST['uemail'];
   $uloc = $_POST['ulocation'];
   $gemail = $_POST['fundiemail'];
   $gname = $_POST['fundiname'];
   
   $price = $_POST['payment'];
   


   $select = " SELECT * FROM bookings WHERE username = '$uname' && date = '$date'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'you already booked!';
      
     

   }else{
    $insert = "INSERT INTO bookings(username,date,useremail,userlocation,gardemail,gardener,price) VALUES('$uname','$date','$uemail','$uloc','$gemail','$gname','$price')";
         mysqli_query($conn, $insert);
         header('location:bookings.php');
    
   }

};


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="modal modal-signin position-static d-block bg-white-+ py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Book your Gardener</h2>
        <a href="find.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" action="" method="post">
          <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <br>
          <div class="form-floating mb-3">
            <input type="text" name="uname" value="<?php echo $_SESSION['user_name']?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" name="date" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput"> Date</label>
          </div>
          
          <div class="form-floating mb-3">
            <input type="email" value="<?php echo $_SESSION['user_email']?>" name="uemail" class="form-control rounded-3" id="floatingInput" required placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="ulocation" value="<?php echo $_SESSION['client_location'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">My Location</label>
          </div>
          

          

          
          <div class="form-floating mb-3">
            <input type="text" name="fundiemail" value="<?php echo $row['email']?>" class="form-control rounded-3" id="floatingInput" required placeholder="enter contact">
            
            <label for="floatingInput">Gardener Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="fundiname" value="<?php echo $row['username'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Gardener Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="payment"  value="<?php echo $row['price'] ?>" class="form-control rounded-3" id="floatingInput" required placeholder="">
            <label for="floatingInput">Price</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary bg-black" name="submit" type="submit">Book Gardener</button>

          
          
          
        </form>
      </div>
    </div>
  </div>
</div>



</body>
<style type="text/css">
  body{
    background-color: black;
  }
  span{
    width: 100%;
    
    
  }
  .modal-content{
    background-color: #8fc04e;
  }
</style>
</html>