<?php
  include 'partials/connect.php';
  $insert=false;
  $showError=false;
  if($_SERVER['REQUEST_METHOD']=='POST')
  {

    $username=$_POST['username'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    if(($username!="")&&($pass==$cpass)&&($pass!="")){
      $sql="SELECT * FROM `secure` WHERE `secure`.`username`='$username'";
      $result=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($result);
      if($num==0){
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql1="INSERT INTO `secure` (`sno`, `username`, `password`, `timestamp`) VALUES (NULL, '$username', '$hash', current_timestamp())";
        $result1=mysqli_query($conn,$sql1);
        if($result1){
          $insert=true;
        }
      }
    }
    else
    {

      $showError=true;
    }
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Sign-Up</title>
  </head>
  <body>
   <?php
        include 'partials/navbar.php';
        if($insert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Congratulations!</strong> Your account has been created successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if($showError){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Sorry!</strong> you have made an error.<strong> Possibilities</strong> are written below.   <ul class="list-group">
          <li class="list-group-item list-group-item-danger"><> Username might me Null</li>
          <li class="list-group-item list-group-item-danger"><> Password might be Null</li>
          <li class="list-group-item list-group-item-danger"><> Passward and Confirm Password fields have different values</li>
          <li class="list-group-item list-group-item-danger"><> Username already exists</li>
        
        </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
   ?>
   <div class="container mt-3">
        <h1>Create A New Account For I-SECURE</h1>
        <form method="post" action="signup.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your details with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputcPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="exampleInputcPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>