<?php 

$con = new mysqli("localhost", "root", "", "northwind");

if(!isset($_GET['con']) && !isset($_GET['city']))
{
    $query = "SELECT * from customers";
}
elseif(isset($_GET['con'])) 
{
    $country = $_GET['con'];
    $query = "SELECT * from customers where Country = '$country'";
}
elseif(isset($_GET['city'])) {
    $city = $_GET['city'];
    $query = "SELECT * from customers where City = '$city'";
}

$result = $con->query($query);

while($customers = $result->fetch_assoc())
{
    echo "<tr><td>".$customers['ContactName']."</td><td>".$customers['City']."</td><td>".$customers['Country']."</td></tr>";
}
?>