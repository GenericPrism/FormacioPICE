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
<div class="container" id="customers">
    <table class="table table-striped" id="taula">
        <thead>
        <tr>
            <th scope="col" class="text-center">Order ID</th>
            <th scope="col" class="text-center">Customer Name</th>
            <th scope="col" class="text-center">Employee Name</th>
            <th scope="col" class="text-center">Order Date</th>
            <th scope="col" class="text-center">Shipped Date</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
    <div class="row info">
        <div class="col-xs-12">
            <table class="table table-striped" id="taulaOrders">
                <h3 style="text-align: center;">Order Details</h3>
                <thead>
                <tr>
                    <th scope="col" class="text-center">Product Name</th>
                    <th scope="col" class="text-center">Category Name</th>
                    <th scope="col" class="text-center">Company Name</th>
                </tr>
                </thead>
                <tbody id="tbodyOrders">

                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'getOrders.php',
                method: 'GET',
                success: function (result) {
                    $("#tbody").html(result);
                }
            });
            $(document).on("click", "#taula tbody tr", function () {
                var selected = $(this).hasClass("highlight");
                $("#taula tbody tr").removeClass("highlight");
                if (!selected) {
                    $(this).addClass("highlight");
                }
                var customerId = $(this).children('td:first').text();
                $.ajax({
                    url: 'getOrderDetails.php?order=' + customerId,
                    method: 'GET',
                    success: function (result) {
                        $("#tbodyOrders").html(result);
                    }
                });
                $('#taulaOrders').show();
            });
        });
    </script>
</body>

</html>
