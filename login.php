<?php

@include ('connection.php');
@include ('nav.php');

error_reporting(0);

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $mobile = $_POST['mobile'];

   $select = " SELECT * FROM userdata WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);



   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['status'] == 1){


         $_SESSION['user_name'] = $row['username'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['phone'] = $row['mobile'];
         $_SESSION['id'] = $row['id'];
         
          header('location:userpage.php');
         
         
        

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="navbar-top-fixed.css" rel="stylesheet">
  
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
        <h2 class="fw-bold mb-0">User Login</h2>
        <a href="index.html"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" action="" method="post">
          <div>
            <center>
          <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="alert alert-danger" style="width: 100%;">'.$error.'</span>';
         };
      };
      ?>
    </center>
    </div>
      <br>
          
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-3" id="floatingInput" required placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-3" id="floatingInput" required placeholder="enter password">
            <label for="floatingInput">Password</label>
          </div>
          
          <button class="w-100 mb-2 btn btn-lg bg-black rounded-3 text-white" name="submit" type="submit">Sign In</button>
          
          <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">Dont have account?</h2>
          
          <a class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" href="createaccount.php" >Sign Up</a>

          <a class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" href="employeereg.php" >Rather create gardener account</a>
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