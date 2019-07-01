<?php 
  
    session_start();

?>

<?php 
    unset($_SESSION['nom']);
    session_destroy();
?>