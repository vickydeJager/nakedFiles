<?php
    require_once "funcTable.php";

    function database($db, $conn) {
        $use = "USE " . $db;
        $usedb =  $conn->query($use);

        if (!$usedb) {
            $create = "CREATE DATABASE " . $db;

            if ($conn->query($create) === false){
                echo "Error creating database: " . $conn->error;
            }

            tblFiles($conn, $db);
            // scenario - db create but not the table
        }

        return true;
        $conn->close();
    }
?>