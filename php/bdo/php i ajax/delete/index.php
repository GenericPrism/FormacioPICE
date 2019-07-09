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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>PHP FORMS 1</title>
    <style>
        #customers {
            height: 500px;
        }

        td {
            text-align: center;
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

        #dialog-confirm, #dialog-supplier {
            display: none;
        }
    </style>
</head>

<body>
<div class="container" id="customers">
    <h3 style="text-align: center;">Suppliers</h3>
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Empresa</th>
            <th scope="col" class="text-center">Contacte</th>
            <th scope="col" class="text-center">-</th>
        </tr>
        </thead>
        <tbody id="tbody">
        <?php

        $con = new mysqli("localhost", "root", "", "northwind");

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "DELETE FROM suppliers where SupplierID = " . $id;

            if ($con->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $con->error;
            }
        }

        $query = "SELECT * from suppliers";

        $result = $con->query($query);

        while ($supplier = $result->fetch_assoc()) {
            echo utf8_encode("<tr><td>" . $supplier['CompanyName'] . "</td><td>" . $supplier['ContactName'] . "</td><td><button type='button' id=" . $supplier['SupplierID'] . " class='btn btn-danger'>Delete</button></td></tr>");
        }
        ?>
        </tbody>
    </table>
</div>
<div id="dialog-confirm" title="Realment vols eliminar aquest Supplier?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>This Supplier has <span
                id="nItems"></span> products that will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="dialog-supplier" title="Sel·leccioni un Supplier">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span><select name="supplier"
                                                                                                    id="sel_sup"></select>
</div>
<script>
    $(document).ready(function () {
        $("button").click(function () {
            var id = this.id;
            console.log(this.id);
            var tr = $(this).closest("tr");
            $.ajax({
                url: "allProducts.php?id=" + id,
                method: 'GET',
                success: function (result) {
                    console.log(result);
                    $('#nItems').html(result);
                    $('#dialog-confirm').show();
                    $("#dialog-confirm").dialog({
                        resizable: false,
                        height: "auto",
                        width: 400,
                        modal: true,
                        buttons: {
                            "Delete all items": function () {
                                $.ajax({
                                    url: 'allProducts.php?deleteAll=' + id,
                                    method: 'GET',
                                    success: function (result) {

                                    }
                                })
                                $(this).dialog("close");
                            },
                            "Delete all + move products":

                                function () {

                                    var supplier = 1;
                                    $.ajax({
                                        url: 'allProducts.php?supplier=' + supplier,
                                        method: 'GET',
                                        success: function (result) {
                                            console.log(result);
                                            $('#sel_sup').html(result);
                                            $("#dialog-supplier").dialog({
                                                resizable: false,
                                                height: "auto",
                                                width: 400,
                                                modal: true,
                                                buttons: {
                                                    "Delete": function () {
                                                        $.ajax({
                                                            url: 'allProducts.php?delete=' + supplier,
                                                            method: 'GET',
                                                            success: function (result) {
                                                                console.log(result);
                                                            }
                                                        })
                                                            $( this).dialog("close");
                                                    },
                                                        Cancel: function () {
                                                            $(this).dialog("close");
                                                        }
                                                    }
                                                });
                                        });
                                )
                        })
                    $(this).dialog("close");

                ,
                    Cancel: function () {
                        $(this).dialog("close");
                    }
                }
            });
        });
    });
    })
    ;
    })
    ;
</script>
</body>

</html>
