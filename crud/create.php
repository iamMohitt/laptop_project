<?php
require_once('../db/config.php');

$laptopName="";
$type="";
$price="";
$color="";
$weight="";
$memory="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $laptopName=$_POST["laptopName"] ?? null; 
    $type=$_POST["type"]?? null;
    $price=$_POST["price"]?? null;
    $color=$_POST["color"]?? null;
    $weight=$_POST["weight"]?? null;
    $memory=$_POST["memory"]?? null;


    do{
         if(empty($laptopName) ||   empty($type) || empty($price ) || empty($color)|| empty($weight)|| empty($memory)){
$errorMessage="All the fields are required";
break;
        }

        // insert laptop in DATABASE

        $sql = "INSERT INTO laptop (laptopname, type, price, color, weight,memory) " . 
        "VALUES ('$laptopName', '$type', '$price', '$color', '$weight', '$memory')";
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Insertion Failed: " . $connection->error;
            break;
        }

 $laptopName="";
$type="";
$price="";
$color="";
$weight="";
$memory="";

$successMessage="Laptop added correctly";
header("location: /assigment_notes/home.php");
exit;
    }while(false);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My laptop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New laptop</h2>

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
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Laptop Name</label>
      <input type="text" class="form-control" name="laptopName" placeholder="Laptop Name" value="<?php echo $laptopName; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputType">Type</label>
      <input type="text" class="form-control" name="type" placeholder="type" value="<?php echo $type; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPrice">Price</label>
      <input type="text" class="form-control" name="price" placeholder="Price" value="<?php echo $price; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputColor">Color</label>
      <input type="text" class="form-control" name="color" placeholder="Color" value="<?php echo $color; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputWeight">Weight</label>
      <input type="text" class="form-control" name="weight" placeholder="Weight" value="<?php echo $weight; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputMemory">Memory</label>
      <input type="text" class="form-control" name="memory" placeholder="Memory" value="<?php echo $memory; ?>">
    </div>
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

<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid"> 
        <button type="submit" class="btn btn-primary">
            Submit
</button>
</div>
<div class="col-sm-3 d-grid">
  <a class="btn btn-outline-primary" href="/assigment_notes/home.php" role="button">Cancel</a>
</div>
</div>

</div>

</form>
        </div>
</body>
</html>