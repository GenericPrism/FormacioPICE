<?php

$con = new mysqli("localhost", "root", "", "northwind");

if(!isset($_GET['pag']))
{
    $offset = 0;
}
else {
    $offset = $_GET['pag'];
}

$query = "SELECT o.OrderID, c.CompanyName, e.FirstName, e.LastName, o.OrderDate, o.ShippedDate from orders o 
          inner join customers c 
          	on o.CustomerID = c.CustomerID
          inner join employees e 
          	on o.EmployeeID = e.EmployeeID Limit ".$offset.",10";
$query2 = "SELECT * FROM orders";

$result = $con->query($query);
$result2 = $con->query($query2);

$pagination = $result2->num_rows;

$result = $con->query($query);

while ($orders = $result->fetch_assoc()) {
    echo utf8_encode("<tr><td style=\"display:none;\" class=\"pg\">".$pagination."</td><td>" . $orders['OrderID'] . "</td><td>" . $orders['CompanyName'] . "</td><td>" . $orders['FirstName'] . " ".$orders['LastName']."</td><td>" . $orders['OrderDate'] . "</td><td>".$orders['ShippedDate']."</td></tr>");
}

?>