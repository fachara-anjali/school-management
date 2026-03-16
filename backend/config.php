<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "school_management";

    $conn = mysqli_connect($servername,$username,$password,$databasename);

    if(!$conn){
        echo mysqli_connect_errno();
    }
?>