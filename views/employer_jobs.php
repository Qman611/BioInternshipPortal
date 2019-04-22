<!DOCTYPE html>
<html>
<head>
<title>Bio Internship Portal</title>
<link rel="stylesheet" href="users2.css"/>
</head>
<body>
  <div style="width: 100%; height: 100vh;min-width: 500px;" id = "container">
	<div id = "row">
			<div id = "sidePanel" class="sidebar">
				<h1>Biology Internship Portal</h1>
                <p>D'Arcy Wentworth Roper</p>
				<button class="sidePanelRow">Jobs</button>
				<button onclick="window.location.href='employer_applicant_pool.php'" class="sidePanelRow">Applicants</button>
				<button onclick="window.location.href='employer_settings.php'" class="sidePanelRow">Settings</button>
				<a href="BIP_login.php" style = "margin-top: 30px;" class="button">log out </a>
			</div>
			<div id = "infoPanel" class = "mainScreen">
				<div style="display: table;border-bottom: 2px solid black; width: 100%;">
<?php
	// delete when $id is actually employer id
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

    // replace $employer_id with $id when it's valid
    $sql = "SELECT company_name FROM user_table WHERE user_id='".$id."'";
    //echo $sql;
    $company_name_query = mysqli_query($conn, $sql);

    $company_name = "Thermo Fisher Scientific";		//dummy value
    if ($company_name_query) {
        $result = mysqli_fetch_assoc($company_name_query);
        $company_name = $result['company_name'];
    }

    // display header
	echo '<div style = "display: table-row;">
			<div id = "cell" style = "text-align: center;">
				<h1 style="font-size: 40px; color: #F0EAD6; display: table-cell; width: 100%; text-align: center;">
				'.$company_name.'
				</h1>
			</div>
			<button onclick="window.location.href=\'employer_job_creation.php\'"; style="margin-right:20px; margin-bottom:10px; width: 200px; height: 30px"> Create New Job Listing </button>

		</div>
	</div>
	<table align="center" style="margin-top:20px">
			<tbody>';

	// replace $employer_id with $id when it's valid
	$sql = "SELECT * FROM job_posting_table where employer_id = '".$id."'";
    $retval = mysqli_query( $conn, $sql);

    if(!$retval) {
      die('Could not get data: ' . mysqli_error($conn));
   }

   // display actual job listings
    while($row = mysqli_fetch_assoc($retval)) {
    	echo '<tr align="center">
				<td class="card">
					<div class="jobImage">
					    <a href="employer_job_view.php?id='.$row['job_id'].'">
							<img src="get_image.php?id='.$row['icon_id'].'" class="imgSize">
						</a>
					</div>
					<div class="jobInfo">
						<h3>'.$row['job_title'].'</h3>
						<p class="noMarginBottom">
							'.$company_name.'
							</br>
							'.$row['location'].'
						</p>
					</div>
					<div class="jobDescription">
						<p>
							'.$row['job_description'].'
						</p>
					</div>
				</td>
			</tr>';
    }

    mysqli_close($conn);
?>

					</tbody>
				</table>
			</div>
	</div>
</div>
<div class="footer">
	<p>footer items that we need to copy from careerbuzz</p>
	<a href="somelink.edu">some link</a>
</div>
</body>

</html>
