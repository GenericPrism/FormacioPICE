<?php 
    session_start();
    if(isset($_POST['tipus_cotxe']))
    {
        $_SESSION['tipus'] = $_POST['tipus_cotxe'];
    }
    if(isset($_POST['tipus_moto']))
    {
        $_SESSION['tipus'] = $_POST['tipus_moto'];
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../plugins/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/46d6e5048e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>PHP FORMS 1</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="pas3.php">
            <label>Descripció</label>
            <select name="color">
                <option value="vermell">Vermell</option>
                <option value="blau">Blau</option>
                <option value="groc">Groc</option>
            </select>
            <input type="submit" value="triar">
        </form>
    </div>
    <script>

    </script>
</body>

</html>