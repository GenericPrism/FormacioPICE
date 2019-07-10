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

        #dialog-confirm {
            display: none;
        }

        label {
            width: 150px;
        }
    </style>
</head>

<body>
<div class="container" id="customers">
    <form method="post" action="afegir.php" enctype="multipart/form-data">
        <label>Product Name:</label>
        <input type="text" name="first_name" id="firstname">
        <br><label>Last Name:</label>
        <input type="text" name="last_name" id="lastname">
        <br><label>Birth Date:</label>
        <input type="text" name="birth_date" id="birthdate">
        <br><label>Hire Date:</label>
        <input type="text" name="hire_date" id="hiredate">
        <br><input type="file" name="file">
        <input type="submit" value="Enviar">
    </form>
</div>
<script>
    $(document).ready(function () {

    });
</script>
</body>

</html>
