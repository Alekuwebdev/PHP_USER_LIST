<?php 

    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        include('connectionDB/connection.php');

        $sql = "DELETE FROM users WHERE id = $id";
        $connection->query($sql);
    }

    header("location: /PHP_USER_LIST/index.php");

?>