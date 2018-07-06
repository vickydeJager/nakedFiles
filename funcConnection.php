<?php
    function connection($serverName, $userName, $password){
        $conn = new mysqli($serverName, $userName, $password);

        if ($conn->connect_error){
            die ("Connection failed: " . $conn->connect_error);
            $conn->close();
        }

        return $conn;
        $conn->close();
    }
?>