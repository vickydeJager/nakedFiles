<?php
    //print_r($_FILES);// exit;

    if(!empty($_FILES)){
        $target_dir = "files/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $fileName = $_FILES['fileToUpload']['name'];
        $fileType = $_FILES['fileToUpload']['type'];
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
        $fileSize = $_FILES['fileToUpload']['size'];

        print_r($_FILES['fileToUpload']['tmp_name']); exit;
        if(isset($_POST["submit"])) { 
            if (!file_exists($target_dir)) {
                mkdir($target_dir);
            }

            if (file_exists($target_file)) {
                $_SESSION['file']['error'] = "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if($fileExtension != "pdf") {
                $_SESSION['file']['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        }

        if ($uploadOk == 0) {
            $_SESSION['file']['error'] = "Sorry, your file was not uploaded.";
        }else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $_SESSION['file']['success'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $_SESSION['file']['error'] = "Sorry, there was an error uploading your file.";
            }
        }

        require "queries.php";

        $result = Queries::saveFile($fileName, $fileType, $fileSize, $fileTmpName, $target_file);

        Database::disconnect();
        header('Location: index.php'); 
    }
    
?>