<?php

$_FILES['file']['tmp_name'];

//$_FILES['file']['tmp_name'];

if(!file_exists("uploads/"))
{
    mkdir("uploads", "0777");
}

if(file_exists("uploads/".basename($_FILES['file']['name'])))
{
    echo "Aquest fitxer ja existeix";
}
else {
    if(move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".basename($_FILES['file']['name'])))
    {
        echo "imatge pujada correctament";
    }
    else {
        echo "mec";
    }
}
?>