<?php

$con = new mysqli("localhost", "root", "", "northwind");
$query = "SELECT * FROM customers";

$result = $con->query($query);

while($customer = $result->fetch_assoc())
{
    echo utf8_encode("<option value='".$customer['CustomerID']."'>".$customer['CompanyName']."</option>");
}

$con->close();
?>