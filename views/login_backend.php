<?php
    //print_r($_POST);
    if (array_key_exists('username', $_POST)) {
        //TODO: Read user type from database
        $dbhost = 'localhost:3306';
        $dbuser = 'portal_user';
        $dbpass = 'portal-password';

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

        if(mysqli_connect_errno() ) {
           die('Could not connect: ' . mysqli_connect_error());
        }
       //echo 'connection ok';

        $sql = "SELECT * FROM user_table WHERE user_id = '".$_POST['username']."'";
        $retval = mysqli_query( $conn, $sql);

       //echo "got back: ".mysqli_num_rows($retval)."rows </br>";

        if(! $retval ) {
           die('Could not get data: ' . mysqli_error($conn));
        }
        //print_r($retval);
        if($retval->num_rows < 1) {
            //delete old cookies
            setcookie("username", "", time() - 3600);
            setcookie("usertype", "", time() - 3600);
            die('User not found: '.$_POST['username']);
        }
        $row = mysqli_fetch_assoc($retval);

        //print_r($row);

        setcookie("username", $row['user_id']);
        setcookie("usertype", $row['user_type']);
        echo 'Login successful</br>';
        echo '<a href="javascript:history.back()">Go Back</a>';
        if ($row['user_type'] == 'student') {
            $url = 'student_jobs_page.php';
        } elseif ($row['user_type'] == 'employer') {
            $url = 'employer_jobs.php';
        } else {
            $url = 'user_list.php';
        }
        header('Location: ' . $url, true, 303);
    } else {
        echo 'Header missing username';
    }
?>