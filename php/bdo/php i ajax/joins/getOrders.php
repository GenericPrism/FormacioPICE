<?php
$con = new mysqli("localhost", "root", "", "northwind");

$query = "SELECT o.OrderID, cu.ContactName, e.FirstName, e.LastName, o.OrderDate, o.ShippedDate FROM orders o 
          LEFT JOIN customers cu ON o.CustomerID = cu.CustomerID
          LEFT JOIN employees e ON o.EmployeeID = e.EmployeeID LIMIT 10";

$result = $con->query($query);

while ($details = $result->fetch_assoc()) {
    $name = $details['FirstName'] . " " . $details['LastName'];

    echo utf8_encode("<tr><td>" . $details['OrderID'] . "</td><td>" . $details['ContactName'] . "</td><td>" . $name . "</td><td>" . $details['OrderDate'] . "</td><td>" . $details['ShippedDate'] . "</td></tr>");
}
?>