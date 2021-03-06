<?php
    //print_r($_POST);
    //echo '</br>';
    //print_r($_FILES['icon_upload']);

    //echo '</br>';



    $dbhost = 'localhost:3306';
    $dbuser = 'portal_user';
    $dbpass = 'portal-password';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

    if (array_key_exists('username', $_COOKIE) && array_key_exists('usertype', $_COOKIE)) {
        $employer_id = (string)$_COOKIE['username'];
        $employer_id = mysqli_escape_string($conn,$employer_id);
    } else {
        echo "Not logged in";
        $url = 'login.php';
        header('Location: ' . $url, true, 303);
        die();
    }

    $file_content = mysqli_escape_string($conn, file_get_contents($_FILES['icon_upload']['tmp_name']));
    //$file_content = 'file content goes here'
    if(mysqli_connect_errno() ) {
      die('Could not connect: ' . mysqli_connect_error());
    }
    //TODO: Upload icon and keep id
    //echo 'uploading image';
    $sql = "INSERT INTO `cpny_icon_table` (`employer_id`, `image_data`) VALUES ('{$employer_id }', '{$file_content}')";
    if(mysqli_query($conn, $sql)){
        // Obtain last inserted id
        $last_id = mysqli_insert_id($conn);
        //echo "Records inserted successfully. Last inserted ID is: " . $last_id;
        //Now add job entry

        $pos_title = mysqli_escape_string($conn,$_POST['pos_title']);
        $job_desc = mysqli_escape_string($conn,$_POST['job_desc']);
        $qualification = mysqli_escape_string($conn,$_POST['qualification']);
        $responsibility = mysqli_escape_string($conn,$_POST['responsibility']);
        $location = mysqli_escape_string($conn,$_POST['location']);
        $work_term = mysqli_escape_string($conn,$_POST['work_term']);
        $research_area = mysqli_escape_string($conn,$_POST['research_area']);
        $abstract = mysqli_escape_string($conn,$_POST['abstract']);
        $security = mysqli_escape_string($conn,$_POST['security']);

        // sorry to anyone who has to deal with this ;)

        $sql = "INSERT INTO `job_posting_table`
        (`employer_id`,
        `job_title`,
        `post_date`,
        `expire_date`,
        `start_date`,
        `job_description`,
        `qualifications`,
        `responsibility`,
        `location`,
        `work_term`,
        `research_area`,
        `degree_level`,
        `min_gpa`,
        `work_authorization`,
        `icon_id`,
        `abstract`,
        `security_clearance`) VALUES
        ('{$employer_id}',
        '{$pos_title}',
        CURDATE(),
        '{$_POST['deadline']}',
        '{$_POST['start_date']}',
        '{$job_desc}',
        '{$qualification}',
        '{$responsibility}',
        '{$location}',
        '{$work_term}',
        '{$research_area}',
        '{$_POST['degree_level']}',
        '{$_POST['min_gpa']}',
        '{$_POST['work_auth']}',
        {$last_id},
        '{$abstract}',
        '{$security}'
        )";
        if(mysqli_query($conn, $sql)){
            echo "Job added";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    echo '</br><a href="employer_jobs.php">Continue</a>';
    //echo 'image upload done';
    //TODO: Add job listing
    mysqli_close($conn);
?>