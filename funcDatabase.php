<?php
    function database($db, $conn) {
        $use = "USE " . $db;
        $res =  $conn->query($use);

        if (!$res) {
            $create = "CREATE DATABASE " . $db;

            if ($conn->query($create) === false){
                echo "Error creating database: " . $conn->error;
            }
        }
    }
?>