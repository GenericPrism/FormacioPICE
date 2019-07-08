<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../../../plugins/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/46d6e5048e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <title>PHP FORMS 1</title>
    <style>
        #customers {
            height: 500px;
        }

        td {
            text-align: center;
        }

        #form_id {
            display: none;
        }

        tr:hover {
            background-color: yellow;
        }

        table.table-striped tbody tr.highlight {
            background-color: rgb(3, 252, 86);
        }

        ul {
            margin-left: 15%;
            text-align: center;
            list-style-type: none;
        }

        li {
            background-color: lightgray;
        }

        #taulaOrders, #taulaOrderDetails {
            display: none;
        }

        .info {
            margin-top: 40px;
        }
    </style>
</head>

<body>

<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $con = new mysqli("localhost", "root", "", "northwind");

        $query = "SELECT * from shippers where ShipperID = '".$id."'";
        $result = $con->query($query);

        $shipper = $result->fetch_assoc();
    }
?>

<div class="container">
    <form method="post" action="shippers.php">
        <label>Shipper Name:</label>
        <input type="text" name="nom" value="<?php echo $shipper['CompanyName']; ?>">
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $shipper['Phone']; ?>">
        <input type="hidden" name="id" value="<?php echo $shipper['ShipperID']; ?>">
        <input type="submit" value="Modificar">
    </form>
</div>
<script>
    $(document).ready(function () {

    });
</script>
</body>

</html>
