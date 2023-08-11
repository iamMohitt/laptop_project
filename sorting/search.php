<html>
<head>
<title>Search laptops</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="/assigment_notes/css/main.css">
</head>

<body>
	<div class="container-wrapper">
	<h3><u>Search laptops by Name and type</u></h3>
	<br/><br/>
	<form class="form-horizontal" action="#" method="post">
	<div class="row">
		<div class="form-group">
		    <label class="control-label col-sm-4" for="email"><b>Search Laptop Information:</b>:</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="search" placeholder="search here">
		    </div>
		    <div class="col-sm-2">
		      <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
		    </div>
		</div>
		
	</div>
    </form>
	<br/><br/>
	<h3><u>Search Result</u></h3><br/>
	<div class="table-responsive">          
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
             require_once('../db/config.php');

                $laptop_details='';
                if(isset($_POST['save']))
                {
                    if(!empty($_POST['search']))
                    {
                        $search = $_POST['search'];
                        $sql="select * from laptop where laptopname like '%$search%' or type like '%$search%'";
$result=$connection->query($sql);



while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>$row[id]</td>
    <td>$row[laptopname]</td>
    <td>$row[type]</td>
    <td>$row[price]</td>
    <td>$row[color]</td>
    <td>$row[weight]</td>
    <td>$row[memory]</td>
</tr>";
  }
                        
                    }
                 
                   
                }


		    	 if(!$laptop_details)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	
		    	?>
	    	
	     </tbody>
	  </table>
	</div>
</div>
</body>
</html>