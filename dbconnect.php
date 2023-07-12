<?php
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "businessdb";

    $connectionString = mysqli_connect($db_server, $db_username, $db_password, $db_database);

    function CloseConnect($connectionString){
        mysqli_close($connectionString);
    }
?>