<?php
    //print_r($_POST);
    //echo '</br>';
    //print_r($_FILES['icon_upload']);

    //echo '</br>';

    $dbhost = 'localhost:3306';
    $dbuser = 'portal_user';
    $dbpass = 'portal-password';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

    if(mysqli_connect_errno() ) {
      die('Could not connect: ' . mysqli_connect_error());
    }
    print_r($_FILES);
    $resume_file = mysqli_escape_string($conn,file_get_contents($_FILES['resume']['tmp_name']));
    $cover_letter_file = mysqli_escape_string($conn,file_get_contents($_FILES['cover_letter']['tmp_name']));
    $student_id = 'Sengoku';
    $placeholder_application_id = -1;
    $file_name = 'Sengoku_resume.pdf';

    $sql = "INSERT INTO `resume_file_table`
    (`student_id`,
    `job_application_id`,
    `proper_file_name`,
    `resume_file`,
    `cover_letter_file`) VALUES
    ('{$student_id}',
    '{$placeholder_application_id}',
    '{$file_name}',
    '{$resume_file}',
    '{$cover_letter_file}')";

    if(mysqli_query($conn, $sql)){
        echo "Resume added";
        $resume_id = mysqli_insert_id($conn);


        $sql = "INSERT INTO `job_application_table`
        (`student_id`,
        `job_id`,
        `resume_id`,
        `application_timestamp`,
        `application_update_timestamp`,
        `application_status`) VALUES
        ('{$student_id}',
        '{$_POST['job_id']}',
        '{$resume_id}',
        CURDATE(),
        CURDATE(),
        'New')";
        if(mysqli_query($conn, $sql)){
            $job_application_id = mysqli_insert_id($conn);
            $sql = "UPDATE `resume_file_table` SET `job_application_id` = '{$job_application_id}' WHERE `resume_file_table`.`resume_file_id` = '{$resume_id}'";
            if(mysqli_query($conn, $sql)){
                echo "Job application successful";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    mysqli_close($conn);


?>