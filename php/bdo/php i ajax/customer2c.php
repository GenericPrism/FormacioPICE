<?php 

$con = new mysqli("localhost", "root", "", "northwind");

$country = $_GET['con'];

if(!isset($_GET['con']))
{
    $query = "SELECT DISTINCT(City) from customers where Country = '$country'";
}
else {
    $query = "SELECT DISTINCT(City) from customers where Country = '$country'";
}

$result = $con->query($query);

while($city = $result->fetch_assoc())
{
    echo "<option value=".$city['City'].">".$city['City']."</option>";
}
?>