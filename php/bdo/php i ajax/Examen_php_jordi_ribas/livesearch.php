<?php

if(isset($_GET['nom_client']) && isset($_GET['empleat']))
{
    $cli = $_GET['nom_client'];
    $empleat = $_GET['empleat'];

    $query = "SELECT * FROM orders o 
              inner join customers c 
                ON o.CustomerID = c.CustomerID
              inner join employees e 
                ON o.EmployeeID = e.EmployeeID
              where c.CompanyName LIKE '%$cli%' AND 
              CONCAT(e.FirstName,' ', e.LastName) LIKE '%$empleat%' limit 0,10";

    $con = new mysqli("localhost", "root", "", "northwind");

    $result = $con->query($query);

    $n_row = $result->num_rows;

    while($client = $result->fetch_assoc())
    {
        echo utf8_encode("<tr><td style=\"display:none;\">".$n_row."</td><td>".$client['OrderID']."</td><td>".$client['CompanyName']."</td><td>".$client['FirstName']." ".$client['LastName']."</td><td>".$client['OrderDate']."</td><td>".$client['ShippedDate']."</td></tr>");
    }
}


?>