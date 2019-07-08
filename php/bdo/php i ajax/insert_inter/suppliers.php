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

        label {
            width: 200px;
            margin-right: 15px;
        }

        #formulari {
            display: none;
        }
    </style>
</head>

<body>
<div class="container" id="customers">
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <h3 style="text-align: center;">Shippers</h3>
            <table class="table table-striped" id="taula">
                <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Company Name</th>
                    <th scope="col" class="text-center">Contact Name</th>
                    <th scope="col" class="text-center">Modify</th>
                </tr>
                </thead>
                <tbody id="tbody">

                <?php

                $con = new mysqli("localhost", "root", "", "northwind");

                $query = "SELECT * from suppliers";
                $result = $con->query($query);

                while ($suppliers = $result->fetch_assoc()) {
                    echo "<tr><td>" . $suppliers['SupplierID'] . "</td><td>" . $suppliers['CompanyName'] . "</td><td>" . $suppliers['ContactName'] . "</td><td><a href='#" . $suppliers['SupplierID'] . "'>Modify</a></td></tr>";
                }

                $con->close();
                ?>

                </tbody>
            </table>
        </div>
        <div id="formulari" class="col-xs-12 col-sm-3">
            <h3>Formulari</h3>
            <form id="infoForms">

            </form>
            <h4 id="modificat"></h4>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("a").on("click", function () {
            var href = $(this).attr('href');
            var id = href.substring(1, href.length);

            $('#formulari').show();

            $.ajax({
                url: "form.php?id=" + id,
                method: "get",
                success: function (result) {
                    $("#infoForms").html(result);
                }
            });
        });
        $("input[type=\"submit\"]").on("click", function () {
            var id = $("input[type=\"hidden\"]").val();

            // $.ajax({
            //     url: "form.php?insert="+id,
            //     method: "get",
            //     success: function (result) {
            //         $("#modificat").html(result);
            //     }
            // });
        });
    });
</script>
</body>

</html>
