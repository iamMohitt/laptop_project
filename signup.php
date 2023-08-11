<?php
require_once('./db/config.php');

$name="";
$email="";
$password="";
$confirmpassword="";
$errorMessage="";
$successMessage="";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST["name"] ?? null; 
    $email=$_POST["email"]?? null;
    $password=$_POST["password"]?? null;
    $confirmpassword=$_POST["confirmpassword"]?? null;

    do{
         if(empty($name) ||   empty($email) || empty($password )|| empty($confirmpassword )){
$errorMessage="All the fields are required";
break;
        }
        if($confirmpassword!=$password){
            $errorMessage="Password does not matches";
            break; 
        }

        // insert user in DATABASE

        $sql = "INSERT INTO user (name, email, password) " . 
        "VALUES ('$name', '$email', '$password')";
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Insertion Failed: " . $connection->error;
            break;
        }

        $name="";
        $email="";
        $password="";
       

$successMessage="User added correctly";
header("location: /assigment_notes/index.php");
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
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assigment_notes/css/main.css">
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/login.webp" height="500px" width="500px"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <?php
if( !empty($errorMessage)){
    echo "
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>close</button>
    </div>
    ";
}


?>
        <form method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-3 me-3" style="color:black;font-size:20px"><b>SIGN UP</b></p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" class="form-control form-control-lg"
              placeholder="Enter a user name" />
            <label class="form-label" for="form3Example3">Name</label>
          </div>

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

          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="confirmpassword" class="form-control form-control-lg"
              placeholder="Enter password again" />
            <label class="form-label" for="form3Example4"> Confirm Password</label>
          </div>
          <?php
if( !empty($successMessage)){
    echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>close</button>
    </div>
    ";
}


?>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Signup</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/assigment_notes/index.php"
                class="link-danger">Login</a></p>
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