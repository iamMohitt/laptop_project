<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laptops</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of laptops</h2>
        <a class="btn btn-primary" href="/assigment_notes/crud/create.php" role="button">New Laptop</a>
        <a class="btn btn-info" href="/assigment_notes/sorting/search.php" role="button">Search</a>
        <a class="btn btn-warning" href="/assigment_notes/sorting/filter.php" role="button">Filter</a>

<br>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Laptop Name</th>
        <th>Type</th>
        <th>Price</th>
        <th>Color</th>
        <th>weight</th>
        <th>Memory</th>
        <th>Action</th>
</tr>
</thead>
<tbody>

<?php
require_once('./db/config.php');
//read the laptop
$sql="SELECT * FROM laptop";
$result=$connection->query($sql);

if(!$result){
    die("selcet query failed: " . $connection->connect_error);
}

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>$row[id]</td>
    <td>$row[laptopname]</td>
    <td>$row[type]</td>
    <td>$row[price]</td>
    <td>$row[color]</td>
    <td>$row[weight]</td>
    <td>$row[memory]</td>
    <td>
    <a class='btn btn-success btn-sm' href='/assigment_notes/crud/edit.php?id=$row[id]' role='button'>Edit</a>
    <a class='btn btn-danger btn-sm' href='/assigment_notes/crud/delete.php?id=$row[id]' role='button'>Delete</a>
</td>
</tr>";
  }
?>

</tbody>
</table>
 </div>
</body>
</html>