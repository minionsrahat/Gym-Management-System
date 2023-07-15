<?php 
include('db_connection.php');
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM trainer_application WHERE request_id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../cv_pdf/' . $file['cv_file_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../cv_pdf/' . $file['cv_file_name']));
        readfile('../cv_pdf/' . $file['cv_file_name']);
  // Now update downloads count
  exit;
  header('location:trainer-application-list.php');
}

}
