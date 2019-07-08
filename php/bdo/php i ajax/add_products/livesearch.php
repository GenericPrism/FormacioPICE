<?php

if(isset($_GET['prod_name']))
{
    $prodName = $_GET['prod_name'];
    $query = "SELECT * FROM products where ProductName = '".$prodName."'";
    $con = new mysqli("localhost", "root", "", "northwind");
    $result = $con->query($query);

    if($result->num_rows > 0)
    {
        echo true;
    }
    else
    {
        echo false;
    }
}




?>