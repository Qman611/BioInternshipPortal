<?php

    $id = $_POST['id'];
    $update = $_POST['update'];
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

    $sql = "UPDATE `job_application_table` SET `application_status` = '{$update}'
    WHERE `job_application_table`.`job_application_id` = '{$id}'";
    if(mysqli_query($conn, $sql)){
        echo "Updated application status";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>