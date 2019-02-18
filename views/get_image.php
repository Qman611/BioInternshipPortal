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
    $sql = "SELECT image_data FROM cpny_icon_table where icon_id = ".$id;
    $retval = mysqli_query( $conn, $sql);
    $row = mysqli_fetch_assoc($retval);
    $img_data = $row['image_data'];
    $info = getimagesizefromstring($img_data);
    //echo $info['mime'];
    header("Content-type: ".$info['mime']);
    echo $img_data;
?>