<?php

$con = new mysqli("localhost", "root", "", "northwind");
$query = "SELECT * FROM products";

$result = $con->query($query);

while($employee = $result->fetch_assoc())
{
    echo utf8_encode("<option value='".$employee['ProductID']."'>".$employee['ProductName']."</option>");
}

$con->close();
?>