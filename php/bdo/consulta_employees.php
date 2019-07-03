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
        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Last Name</th>
      <th scope="col" class="text-center">Name</th>
      <th scope="col" class="text-center">Title</th>
      <!-- <th scope="col" class="text-center">Category ID</th>
      <th scope="col" class="text-center">Quantity x Unit</th>
      <th scope="col" class="text-center">Unit Price</th>
      <th scope="col" class="text-center">Units in Stock</th> -->
    </tr>
  </thead>
  <tbody>
  <?php 

    $con = new mysqli("localhost", "root", "", "northwind");
    
    $query = "SELECT LastName, FirstName, Title FROM employees ORDER BY Title";
    //$query = "SELECT * FROM products where (CategoryID = 1 or CategoryID = 2) and UnitsInStock < 20";
    
    $result = $con->query($query);

    while($employee = $result->fetch_assoc())
    {
        echo "<tr><td>".$employee['LastName']."</td><td>".$employee['FirstName']."</td><td>".$employee['Title']."</td></tr>";
    }

    ?>
   
  </tbody>
</table>
    </div>
    <script>

    </script>
</body>

</html>