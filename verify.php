<?php
include "database.php";
include './clases/db.clase.php';


conexion();
function verifyMail(){
    $sql='SELECT mail from user';
    

    if (is_iterable($record) == 1 ) {
        $n = mysqli_fetch_array($record);}
    foreach($n as $mail){
        if($mail == $_POST['mail'])
        return true;        
    }
    return false;
    
}