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
    <title>PHP 1</title>
    <style>
        
    </style>
</head>

<body>
    <div class="container">
        <!-- <label>Introdueix un nombre</label>
        <input id="num" type="text"> -->
        <?php  $num = $_GET['num']; ?>
        <h2>Taula de multiplicar del <?php echo $num ?> </h2>
        <table class="table" style="text-align:center;">
            <tbody>
                <?php
                for($i = 1; $i<=10; $i++) { ?>
                <tr>
                    <th scope="row" style="text-align:center;"> <?php echo $num ?> </th>
                    <td> <?php echo $i; ?> </td>
                    <td> <?php echo $i*$num; ?>  </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <input type="radio" name="conversion" value="dollar"> Dollars<br>
        <input type="radio" name="conversion" value="euro"> Euro<br>
        <table class="table" style="text-align:center;">
            <thead>
                <th style="text-align:center;">$</th>
                <th style="text-align:center;">€</th>
            </thead>
            <tbody>
                <?php for($i = 1; $i<=5000; $i++) { ?>
                <tr>
                    <!-- Es pot fer amb un while i anar incrementant la i en detriment al seu valor -->
                    <?php if($i <= 5 || $i == 10 || $i == 15 || $i == 20 || $i == 30 || $i == 40 || $i == 50 || $i == 100 || $i == 200 || $i == 300 || $i == 400 || $i == 500 || $i == 1000 || $i == 2000 || $i == 3000 || $i == 4000 || $i == 5000) {?> 
                    <td> <?php echo $i; ?> </td>
                    <td> <?php echo $i*0.88; ?>  </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
    <script>

    </script>
</body>

</html>