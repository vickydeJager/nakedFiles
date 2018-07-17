<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Read file content">
    <meta name="author" content="Vicky de jager">

    <title>NakedFiles</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="#">
</head>

<?php
if (isset($_SESSION['file']['error'])) {
    echo $_SESSION['file']['error'];
    unset($_SESSION['file']['error']);
}
if (isset($_SESSION['file']['success'])) {
    echo $_SESSION['file']['success'];
    unset($_SESSION['file']['success']);
}
?>

<body class="fixed-nav sticky-footer">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Upload file
            </div>
            <div class="card-body">
                <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
                    Select file to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload" name="upload">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Files</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Mime</th>
                  <th>Size</th>
                  <th>Path</th>
                  <th>Created</th>
                  <th>Downloaded</th>
                  <th>Delete</th>
                  <th>View</th>
                 
                </tr>
              </thead>
             
              <tbody>
                  <pre>
                <?php
                    include 'queries.php';
                    $result = Queries::selectAllFiles();
                    foreach ($result as $row) {
                ?>
                </pre>
                    <tr>
                    <td><?php echo  $row['name']; ?></td>
                    <td><?php echo  $row['mime']; ?></td>
                    <td><?php echo  $row['size']; ?></td>
                    <td><?php echo  $row['path']; ?></td>
                    <td><?php echo  $row['created']; ?></td>
                    <td><a href="<?php echo 'downloadFile.php?id='.$row['id']; ?>" target="_blank"> Download </a></td>
                    <td><a href="<?php echo 'deleteFile.php?id='.$row['id']; ?>" target="_blank"> Delete </a></td>  
                    <td><a href="files/<?php echo $row['name'];?>" target="_blank"> View </a></td>     
                   
                  </tr>
                    <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>

    <footer class="sticky-footer">
      <div class="container-fluid">
        <div class="text-center">
          <small>Copyright © NakedFiles 2018</small>
        </div>
      </div>
    </footer>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/sb-admin-datatables.min.js"></script>

    </body>

</html>
<?php
//echo "<iframe src=\"files/BBG+Free+Week+of+Workouts-1.pdf\" width=\"100%\" style=\"height:100%\"></iframe>";
?>