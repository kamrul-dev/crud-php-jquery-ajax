<?php 
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "crud_student");

    $db_connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$db_connection){
        die("db connection Failed" . mysqli_connect_error($db_connection));
    }
?>