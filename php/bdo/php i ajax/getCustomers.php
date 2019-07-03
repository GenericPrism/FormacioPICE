<?php 

$con = new mysqli("localhost", "root", "", "northwind");

$query = "SELECT * from customers";

$result = $con->query($query);

while($customers = $result->fetch_assoc())
{
    echo "<tr><td>".$customers['CustomerID']."</td><td>".$customers['CompanyName']."</td><td>".$customers['ContactName']."</td><td>".$customers['City']."</td><td>".$customers['Country']."</td></tr>";
}
?>