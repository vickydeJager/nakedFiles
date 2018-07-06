<?php
    function tblFiles($conn, $db) {
        $files = "USE $db;
                    CREATE TABLE files( 
                    id INT NOT NULL AUTO_INCREMENT,  
                    name VARCHAR(250) NOT NULL,  
                    mime VARCHAR(50) NOT NULL DEFAULT 'text/plain',  
                    size BIGINT NOT NULL DEFAULT '0',  
                    data LONGBLOB NOT NULL,  
                    path VARCHAR(250) NOT NULL,    
                    PRIMARY KEY (`id`)
                 );";

        if ($conn->query($files) === TRUE) {
            echo "Table files created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
?>