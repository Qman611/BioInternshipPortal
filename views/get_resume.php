<?php

    $id = $_GET['id'];
    // do some validation here to ensure id is safe

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    $dbhost = 'localhost:3306';
    $dbuser = 'portal_user';
    $dbpass = 'portal-password';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

    if(mysqli_connect_errno() ) {
      die('Could not connect: ' . mysqli_connect_error());
    }
    //echo 'connection ok';

    //TODO Use stored procedure instead
    $sql = "SELECT resume_file, proper_file_name FROM resume_file_table where resume_file_id = ".$id;
    $retval = mysqli_query( $conn, $sql);
    if($row = mysqli_fetch_assoc($retval)){
        $pdf_data = $row['resume_file'];
        //echo $info['mime'];
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=".$row['proper_file_name'].'"');
        echo $pdf_data;
    } else {
        echo "Not found";
    }
?>