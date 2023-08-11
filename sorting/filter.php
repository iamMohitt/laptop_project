<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Filter product by color</h4>
                    </div>
                </div>
            </div>

            <!-- Brand List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filter 
                                <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Color List</h6>
                            <hr>
                            <?php
                               require_once('../db/config.php');

                                $laptop_query = "SELECT * FROM laptop";
                                $laptop_query_run=$connection->query($laptop_query);
                              

                                if(mysqli_num_rows($laptop_query_run) > 0)
                                {
                                    foreach($laptop_query_run as $laptopList)
                                    {
                                        $checked = [];
                                        if(isset($_GET['brands']))
                                        {
                                            $checked = $_GET['brands'];
                                        }
                                        ?>
                                            <div>
                                                <input type="checkbox" name="brands[]" value="<?= $laptopList['id']; ?>" 
                                                    <?php if(in_array($laptopList['id'], $checked)){ echo "checked"; } ?>
                                                 />
                                                <?= $laptopList['color']; ?>
                                            </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Color Found";
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Laptop Items - Products -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">

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
	      </tr>
	    </thead>
	    <tbody>
        <?php
                            if(isset($_GET['brands']))
                            {
                                $branchecked = [];
                                $branchecked = $_GET['brands'];
                                foreach($branchecked as $rowbrand)
                                {
                                    // echo $rowbrand;
                                    $sql = "SELECT * FROM laptop WHERE id IN ($rowbrand)";
                                    $sql_query_run=$connection->query($sql);
                                    if(mysqli_num_rows($sql_query_run) > 0)
                                    {
                                        while($row = $sql_query_run->fetch_assoc()) {
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
                            }
                            else
                            {
                                $products = "SELECT * FROM laptop";
                                $products_run = $connection->query($products);
                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    while($row = $products_run->fetch_assoc()) {
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
                                else
                                {
                                    echo "No Items Found";
                                }
                            }
                        ?>
	    	
	     </tbody>
	  </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>