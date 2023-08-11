<?php
require_once('./db/config.php');

$email="";
$password="";
$errorMessage="";
$successMessage="";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST["email"]?? null;
    $password=$_POST["password"]?? null;

    do{
         if(empty($email) || empty($password )){
$errorMessage="All the fields are required";
break;
        }
       

        // select user in DATABASE

        $sql="SELECT * FROM user 
        WHERE 
    email='$email' AND
         password='$password'";
        $result=$connection->query($sql);
        $row=$result-> fetch_assoc();

        echo $row;

        if(!$row){ //if there is no data with with this id, redirect it
          $errorMessage="User not found";
          echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>$errorMessage</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>close</button>
          </div>
          ";
          break;
        }else{
          header("location: /assigment_notes/home.php");
          exit;
        }
exit;
    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assigment_notes/css/main.css">
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/signup.jpg" height="300px" width="300px"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-3 me-3" style="color:blue;font-size:20px">EXPLORE THE LAPTOPS</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/assigment_notes/signup.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary"  style="margin-top:100px">
   
  </div>
</section>
</body>
</html>