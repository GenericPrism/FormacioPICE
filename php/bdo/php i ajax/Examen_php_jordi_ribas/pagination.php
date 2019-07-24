<?php

if(!isset($_GET['pag']))
{
    $offset = 0;
}
else {
    $offset = $_GET['pag'];
}

if(isset($_GET['type']))
{
    $type = $_GET['type'];
    if($type == 1)
    {
        $query = "select * from orders";
    }
    else if($type == 2)
    {
        $cli = $_GET['param1'];
        $query = "SELECT * FROM orders o 
              inner join customers c 
                ON o.CustomerID = c.CustomerID
              inner join employees e 
                ON o.EmployeeID = e.EmployeeID
              where CompanyName LIKE '%$cli%' LIMIT 0,10";
    }
    else if($type == 3)
    {
        $empleat = $_GET['param1'];
        $query = "SELECT * FROM orders o 
              inner join customers c 
                ON o.CustomerID = c.CustomerID
              inner join employees e 
                ON o.EmployeeID = e.EmployeeID where 
              CONCAT(e.FirstName,' ', e.LastName) LIKE '%$empleat%' LIMIT 0,10";
    }
    else if($type == 4)
    {
        $cli = $_GET['param1'];
        $empleat = $_GET['param2'];

        $query = "SELECT * FROM orders o 
              inner join customers c 
                ON o.CustomerID = c.CustomerID
              inner join employees e 
                ON o.EmployeeID = e.EmployeeID
              where c.CompanyName LIKE '%$cli%' AND 
              CONCAT(e.FirstName,' ', e.LastName) LIKE '%$empleat%' limit 0,10";
    }
}

$con = new mysqli("localhost", "root", "", "northwind");

$result = $con->query($query);

while($rows = $result->num_rows)
{
    echo "<li><a href='index.php?pag='.$rows>$rows</li>";
}


?>