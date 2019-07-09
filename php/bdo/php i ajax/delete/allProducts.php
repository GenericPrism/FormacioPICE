<?php

$con = new mysqli("localhost", "root", "", "northwind");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * from products where SupplierID = " . $id;

    $result = $con->query($query);

    echo $result->num_rows;
}
if (isset($_GET['supplier']) && $_GET['supplier'] == 1) {
    $query = "SELECT * from suppliers";

    $result = $con->query($query);

    while ($suppliers = $result->fetch_assoc()) {
        $nom = str_replace("''", "''''", $suppliers['CompanyName']);
        echo utf8_encode("<option value='" . $suppliers['SupplierID'] . "'>" . $nom . "</option>");
    }
}
if (isset($_GET['deleteAll'])) {
    $id = $_GET['deleteAll'];
    $sql = "DELETE FROM suppliers where SupplierID =" . $id;

    if ($con->query($sql) == TRUE) {
        echo true;
    } else {
        echo false;
    }
}

$con->close();
?>