<?php
require_once('../db/config.php');

$id="";
$laptopname="";
$type="";
$price="";
$color="";
$weight="";
$memory="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
// show the data of laptop

if(!isset($_GET["id"])){ //if id does not exit
    header("location: /assigment_notes/home.php");
    exit;
}

$id=$_GET["id"]; //read data from database by using this id

$sql="SELECT * FROM laptop WHERE id=$id";
$result=$connection->query($sql);
$row=$result-> fetch_assoc();

if(!$row){ //if there is no data with with this id, redirect it
    header("location: /assigment_notes/home.php");
    exit;
}
// get data from row variable
   $laptopname=$row["laptopname"]; 
    $type=$row["type"];
    $price=$row["price"];
    $color=$row["color"];
    $weight=$row["weight"];
    $memory=$row["memory"];

}else{
//update the data of laptop

// first read the data of form
   $id=$_POST["id"] ?? null; 
   $laptopname=$_POST["laptopname"] ?? null; 
    $type=$_POST["type"]?? null;
    $price=$_POST["price"]?? null;
    $color=$_POST["color"]?? null;
    $weight=$_POST["weight"]?? null;
    $memory=$_POST["memory"]?? null;


    // now check if we don't have empty field
    do{
        if(empty($id) || empty($laptopname) ||   empty($type) || empty($price ) || empty($color)|| empty($weight)|| empty($memory)){
$errorMessage="All the fields are required";
break;
       }

       // insert laptop in DATABASE
       $sql = "UPDATE laptop SET laptopname='$laptopname',type='$type', price='$price', color='$color', weight='$weight',memory='$memory'
        WHERE id=$id ";

       $result=$connection->query($sql);

       if(!$result){
           $errorMessage="Updation Failed: " . $connection->error;
           break;
       }


$successMessage="Laptop updated correctly";
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Laptop Name</label>
      <input type="text" class="form-control" name="laptopname" placeholder="Laptop Name" value="<?php echo $laptopname; ?>">
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
</div>


  <div class="col-sm-3 d-grid">
  <a class="btn btn-outline-primary" href="/assigment_notes/index.php" role="button">Cancel</a>
</div>
</div>

</form>
        </div>
</body>
</html>