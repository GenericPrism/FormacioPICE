<?php

$con = new mysqli("localhost", "root", "", "northwind");

if(!file_exists("uploads/"))
{
    mkdir("uploads", "0777");
}

if(isset($_POST['prod_name']) && isset($_POST['suppliers']) && isset($_POST['categories']) && isset($_POST['discounted']))
{
    $prod_name = $_POST['prod_name'];

    $parsed_string = str_replace("'", "''", $_POST['suppliers']);
    $get_supplier_id = "SELECT * FROM suppliers where CompanyName = '".$parsed_string."'";

    $result3 = $con->query($get_supplier_id);
    $supplier_result = $result3->fetch_assoc();
    $supplier_id = $supplier_result['SupplierID'];

    $get_category_id = "SELECT * FROM categories where CategoryName = '".$_POST['categories']."'";

    $result4 = $con->query($get_category_id);
    $category_result = $result4->fetch_assoc();
    $category_id = $category_result['CategoryID'];
    $discounted = $_POST['discounted'];

    $sql = "INSERT INTO products (ProductName, SupplierID, CategoryID, Discontinued) VALUES('".$prod_name."', ".$supplier_id.", ".$category_id.", ".$discounted.")";

    if ($con->query($sql) === TRUE) {

        $query3 = "SELECT * FROM products where ProductName = '".$prod_name."'";
        $result = $con->query($query3);
        $producte = $result->fetch_assoc();

        if(isset($_FILES['photo']))
        {
            if(!file_exists("uploads/".$producte['ProductID']))
            {
                mkdir("uploads/".$producte['ProductID']);
            }
            if(file_exists("uploads/".$producte['ProductID']."/".basename($_FILES['photo']['name'])))
            {
                echo "Aquest fitxer ja existeix";
            }
            else {
                if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$producte['ProductID']."/".basename($_FILES['photo']['name'])))
                {
                    $photo = $_FILES['photo']['name'];
                }
                else {
                    $photo = "";
                }

                $sql2 = "UPDATE products set Photo = '".$photo."' where ProductID = '".$producte['ProductID']."'";

                if ($con->query($sql2) === TRUE) {
                    header('Location: products.php');
                    exit;
                } else {
                    echo "Error updating record: " . $con->error;
                }
            }
        }
    }

}
$query = "SELECT * FROM suppliers";
$query2 = "SELECT * FROM categories";

$result = $con->query($query);
$result2 = $con->query($query2);

$con->close();
?>

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
</head>

<body>
<div class="container" id="customers">
    <h3 style="text-align: center;">Productes</h3>
    <form method="post" action="addProduct.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="prod_name" class="form-control" id="prod_name">
        </div>
        <div class="form-group">
            <label>Supplier</label>
            <select class="form-control" name="suppliers" id="suppliers">
                <?php
                    while($supplier = $result->fetch_assoc())
                    {
                        echo utf8_encode("<option>".$supplier['CompanyName']."</option>");
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="categories" id="categories">
                <?php
                while($category = $result2->fetch_assoc())
                {
                    echo utf8_encode("<option>".$category['CategoryName']."</option>");
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Discounted</label>
            <select class="form-control" name="discounted" id="discounted">
                <option>0</option>
                <option>1</option>
            </select>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" class="form-control" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Afegir</button>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#prod_name').keyup(function () {
            var str = $('#prod_name').val();
            console.log(str);
            $.ajax({
                url: "livesearch.php?prod_name=" + str,
                method: 'GET',
                success: function (result) {
                    if (result) {
                        console.log(result);
                        $('#prod_name').addClass('highlight');
                        $('#prod_name').focus(function () {
                            $(this).addClass("focus-invalid");
                        });
                    } else {
                        $('#prod_name').removeClass('highlight');
                        $('#prod_name').focus(function () {
                            $(this).removeClass("focus-invalid");
                        });
                    }
                }
            })
        });
    });
</script>
</body>

</html>
