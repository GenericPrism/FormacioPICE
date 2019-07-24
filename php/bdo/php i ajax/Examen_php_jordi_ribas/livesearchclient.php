<?php


if(isset($_GET['nom_client']))
{
    $cli = $_GET['nom_client'];
    $query = "SELECT * FROM orders o 
              inner join customers c 
                ON o.CustomerID = c.CustomerID
              inner join employees e 
                ON o.EmployeeID = e.EmployeeID
              where CompanyName LIKE '%$cli%' limit 0,10";

    $con = new mysqli("localhost", "root", "", "northwind");

    $result = $con->query($query);

    while($client = $result->fetch_assoc())
    {
        echo utf8_encode("<tr><td>".$client['OrderID']."</td><td>".$client['CompanyName']."</td><td>".$client['FirstName']." ".$client['LastName']."</td><td>".$client['OrderDate']."</td><td>".$client['ShippedDate']."</td></tr>");
    }
}


?>