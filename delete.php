<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $database = "tas_php";
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "DELETE FROM tas_php_table WHERE id=$id";
        $result = $connection->query($sql);
    }

    header("location:/TASWebProgramming/index.php");
    exit;
?>
