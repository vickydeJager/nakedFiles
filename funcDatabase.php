<?php
    require_once "funcTable.php";

    function database($db, $conn) {
        $use = "USE " . $db;
        $usedb =  $conn->query($use);

        if (!$usedb) {
            $create =  "CREATE DATABASE IF NOT EXISTS `nakedfiles` CHARACTER SET utf8 COLLATE utf8_general_ci;";

            if ($conn->query($create) === true){
                tblFiles($conn, $db);
            }else{
                echo "Error creating database: " . $conn->error;
            }
        }

        return true;
        $conn->close();
    }
?>