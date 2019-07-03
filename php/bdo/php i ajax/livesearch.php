<?php 

if(!isset($_GET['q']))
{
    $empresa = "";
}
else{
    $empresa = $_GET['q'];
}


//lookup all links from the xml file if length of q>0
if (strlen($empresa)>0) {
    $hint="";

    $con = new mysqli("localhost", "root", "", "northwind");
    $query = "SELECT * FROM customers where CompanyName LIKE '%$empresa%'";
    $result = $con->query($query);

    while($client = $result->fetch_assoc())
    {
        echo "<tr><td>".$client['CustomerID']."</td><td>".$client['CompanyName']."</td><td>".$client['ContactName']."</td><td>".$client['ContactTitle']."</td></tr>";
    }
  }
else {
    $hint="no suggestion";
}

?>