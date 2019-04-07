<?php
    $connect=new mysqli("localhost","root","","jk");
    mysqli_query ($connect,"set character_set_results='utf8'");
    if(mysqli_connect_errno()){
        echo 'Conexion Fallida:',  mysqli_connect_error();
        exit();
    }

?>