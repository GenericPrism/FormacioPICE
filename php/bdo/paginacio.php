<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../plugins/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/46d6e5048e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>PHP FORMS 1</title>
    <style>
        
    </style>
</head>

<body>
    <div class="container">
    <form method="get" action="abc.php">
    <select name="nRows">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
    </select>
    <input type="submit" value="n pagines">
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Company Name</th>
      <th scope="col">Contact Name</th>
      <th scope="col">Contact Title</th>
    </tr>
  </thead>
  <tbody>
  <?php 

    $con = new mysqli("localhost", "root", "", "northwind");
    
    if(!isset($_GET['pag']))
    {
        $offset = 0;
    }
    else {
        $offset = $_GET['pag'];
    }

    if(!isset($_GET['nRows']))
    {
        $limit = 10;
    }
    else {
        $limit = $_GET['nRows'];
    }

    $query = "SELECT * FROM customers LIMIT ".$offset.",".$limit;
    $query2 = "SELECT * FROM customers";
    
    $result = $con->query($query);
    $result2 = $con->query($query2);

    $pagination = $result2->num_rows;

    while($client = $result->fetch_assoc())
    {
        echo "<tr><td>".$client['CustomerID']."</td><td>".$client['CompanyName']."</td><td>".$client['ContactName']."</td><td>".$client['ContactTitle']."</td></tr>";
    }

    ?>
   
  </tbody>
</table>
<div class="container">
    <ul>
        <li>
            <?php $cont = 1;
                for($i = 0; $i < $pagination; $i+=$limit) { 
            ?>
                <a href="abc.php?pag=<?php echo $i; ?>&nRows=<?php echo $limit; ?>"><?php echo $cont; ?></a>

            <?php $cont++; } ?>
        </li>
    </ul>
</div>

    </div>
    <script>

    </script>
</body>

</html>