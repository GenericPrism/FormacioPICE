<?php 
    setcookie('idioma', $_GET['lan'], time()+60*60*24);
    //header("Refresh:0;");
?>

<?php echo "La bandera triada és ".$_COOKIE['idioma'] ?>