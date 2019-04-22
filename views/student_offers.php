<!DOCTYPE html>
<html>
<head>
<title>Bio Internship Portal</title>
<link rel="stylesheet" href="users.css"/>
</head>
<body>
<?php
    $id = (string)$_COOKIE['username'];
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

    $sql = "SELECT * FROM job_application_table WHERE student_id = '{$id}' AND application_status = 'ACCEPTED'";
    $retval = mysqli_query( $conn, $sql);

   //echo "got back: ".mysqli_num_rows($retval)."rows </br>";

    if(! $retval ) {
       die('Could not get data: ' . mysqli_error($conn));
    }

?>
<div style="width: 100%; height: 100vh;min-width: 500px;" id = "container">
    <div id = "row">
            <div id = "sidePanel" class="sidebar">
                <h1>Biology Internship Portal</h1>
                <p>D'Arcy Wentworth Roper</p>
                <button onclick="window.location.href='student_jobs_page.php'" class="sidePanelRow">Jobs</button>
                <button class="sidePanelRow">Offers</button>
                <button onclick="window.location.href='student_settings.php'" class="sidePanelRow">Settings</button>
                <a href="BIP_login.php" style = "margin-top: 30px;" class="button">log out </a>
            </div>
            <div id = infoPanel class = "mainScreen">
                <h1 align = "center" style="font-size: 40px; color: #F0EAD6"> Offers</h1>
            <?php
                while($row = mysqli_fetch_assoc($retval)) {
                    $sql = "SELECT * FROM job_posting_table WHERE job_id = '{$row['job_id']}'";
                    $applicants = mysqli_query( $conn, $sql);
                    $job = mysqli_fetch_assoc($applicants);
                    $sql = "SELECT company_name FROM user_table WHERE user_id = '{$job['employer_id']}'";
                    $company = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    echo '
                    <div class="card">
                        <img src="get_image.php?id='.$job['icon_id'].'" style="height:100px;width:100px">
                        <div style="margin-left: 40px">
                            <h1 style="font-size:20px; color: #F0EAD6">'.$job['job_title'].'</h1>
                            <h1 style="font-size:20px; color: #F0EAD6">'.$company.'</h1>
                        </div>
                        <div style= "margin-left: 100px; margin-top: 25px; text-align: center">
                            <a href="#" class="viewOfferButton" style="height:30px;width:90px">View Offer</a>
                        </div>
                        <div style="margin-left: 150px; margin-top: 15px">
                            <a href="#" class="acceptButton">Accept</a>
                            <div style="margin-top: 25px">
                                <a href="#" class="declineButton">Decline</a>
                            </div>
                        </div>
                    </div>';
                }
            ?>




            </div>
    </div>
</div>
<div class="footer">
    <p>footer items that we need to copy from careerbuzz</p>
    <a href="somelink.edu">some link</a>
</div>
</body>

</html>