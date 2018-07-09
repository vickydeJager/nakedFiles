<?php
    function tblFiles($conn, $db) {
        $usedb = "use " . $db . ";";
        
        if ($conn->query($usedb) === false) {
            echo "Database can't be used: " . $conn->error;
        } 

        $files = "CREATE TABLE files( 
                    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
                    `name` VARCHAR(250) NOT NULL,  
                    `mime` VARCHAR(50) NOT NULL DEFAULT 'text/plain',  
                    `size` BIGINT NOT NULL DEFAULT '0',  
                    `data` LONGBLOB NOT NULL,  
                    `path` VARCHAR(250) NOT NULL
                 );";

        if ($conn->query($files) === false) {
            echo "Error creating table: " . $conn->error;
        }

        $images = "CREATE TABLE images( 
                    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  
                    `name` VARCHAR(250) NOT NULL,  
                    `mime` VARCHAR(50) NOT NULL DEFAULT 'text/plain',  
                    `size` BIGINT NOT NULL DEFAULT '0',  
                    `data` LONGBLOB NOT NULL,  
                    `path` VARCHAR(250) NOT NULL
                 );";

        if ($conn->query($images) === false) {
            echo "Error creating table: " . $conn->error;
        }

        $fileTypes = "CREATE TABLE fileTypes( 
                        `id` INT(6) AUTO_INCREMENT PRIMARY KEY,  
                        `name` VARCHAR(250) NOT NULL,  
                        `extension` VARCHAR(10) NOT NULL DEFAULT '.txt'
                     );";

        if ($conn->query($fileTypes) === false) {
            echo "Error creating table: " . $conn->error;
        }

        $fileTypesData = "INSERT INTO fileTypes (`name`, `extension`)
                          VALUES ('Plain Text File','.txt');";
        $fileTypesData .= "INSERT INTO fileTypes (`name`, `extension`)
                          VALUES ('Microsoft Word Document','.doc');";
        $fileTypesData .= "INSERT INTO fileTypes (`name`, `extension`)
                          VALUES ('Microsoft Word Open XML Document','.docx');";
        $fileTypesData .= "INSERT INTO fileTypes (`name`, `extension`)
                          VALUES ('Portable Document Format','.pdf');";

                     
        if ($conn->multi_query($fileTypesData) === false) {
            echo "Error: " . $fileTypesData . "<br>" . $conn->error;
        }     

        $imageTypes = "CREATE TABLE imageTypes( 
            `id` INT(6) AUTO_INCREMENT PRIMARY KEY,  
            `name` VARCHAR(250) NOT NULL,  
            `extension` VARCHAR(10) NOT NULL DEFAULT '.png'
         );";

        if ($conn->query($imageTypes) === false) {
            echo "Error creating table: " . $conn->error;
        }

        /*$imageTypesData = "INSERT INTO fileTypes (`name`, `extension`)
                          VALUES ('','')";*/
    }
?>