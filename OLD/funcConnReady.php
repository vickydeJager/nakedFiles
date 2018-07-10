<?php
    require "funcFiles.php";

    function newConn($serverName, $userName, $password, $db){
        $conn = new mysqli($serverName, $userName, $password, $db);

        if ($conn->connect_error){
            die ("Connection failed: " . $conn->connect_error);
            $conn->close();
        }

        return $conn;
        $conn->close();
}
?>