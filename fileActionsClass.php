<?php 
include 'queries.php';
class fileActions{

    public static function download($id) {
        if (!empty($id) || $id != null) {
            $result = Queries::downloadFile($id);

            if ($result) {
                if($result->num_rows == 1) {
                    $row = mysqli_fetch_assoc($result);

                    header("Content-Type: ". $row['mime']);
                    header("Content-Length: ". $row['size']);
                    header("Content-Disposition: attachment; filename=". $row['name']);

                    echo $row['data'];
                }
            }

            Queries::clear($result);

        } else {
            $_SESSION['file']['error'] = 'File not found.';
            header('Location: index.php');
        }
    }
}
?>