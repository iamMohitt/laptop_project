<?php

//check if get contains the id
if(isset($_GET["id"])){
    $id=$_GET["id"]; // get the id of laptop

    // connect to database
    require_once('../db/config.php');
$sql ="DELETE FROM laptop where id =$id";
$connection->query($sql); // this statement is used to execute the sql querry

}
header("location: /assigment_notes/home.php");
exit;
?>