

<!DOCTYPE html>
<html>
<head>
<title>Bio Internship Portal</title>
<link rel="stylesheet" href="users.css"/>
<link rel="stylesheet" href="view_job_listing.css"/>
<script src="Apply.js"></script>
</head>
<body>
<?php
	$id = $_GET['id'];

	error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    $dbhost = 'localhost:3306';
    $dbuser = 'portal_user';
    $dbpass = 'portal-password';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

    if(mysqli_connect_errno() ) {
      die('Could not connect: ' . mysqli_connect_error());
    }
    $sql = "SELECT * FROM job_posting_table where job_id = ".$id;
    $retval = mysqli_query( $conn, $sql);
    $row = mysqli_fetch_assoc($retval);
?>
<div style="width: 100%; height: 100vh;min-width: 500px;" id = "container">
	<div id = "row">
		<div id = "sidePanel" class="sidebar">
			<h1>Biology Internship Portal</h1>
            <p>D'Arcy Wentworth Roper</p>
						<button onclick="window.location.href='employer_jobs.php'" class="sidePanelRow">Jobs</button>
						<button onclick="window.location.href='employer_applicant_pool.php'" class="sidePanelRow">Applicants</button>
						<button onclick="window.location.href='employer_settings.php'" class="sidePanelRow">Settings</button>
			<a href="BIP_login.php" style = "margin-top: 30px;" class="button">Log Out </a>
		</div>
		<div id = "infoPanel" class = "mainScreen">
			<div style="display: table; border-collapse: collapse; width: 100%;">
				<h1 style="font-size: 40px; color: #F0EAD6; display: table-cell; width: 100%; text-align: center;">&#40New&#41 Job Listing</h1>x`
			</div>
			<?php
			$sql = 'SELECT company_name FROM user_table WHERE user_id ='.$row['employer_id'];
		    $company_name_query = mysqli_query($conn, $sql);
		    if ($company_name_query) {
		        $result = mysqli_fetch_assoc($company_name_query);
		        $company_name = $result['company_name'];
		    } else {
		        $company_name = "Thermo Fisher Scientific";
		    }
			echo '
			<div style = "display: table; width: 100%;">
				<table style="width:100%; border-bottom: 2px solid black;">
					<tr>
						<td rowspan="2" style="width: 200px;">
							<img style = "height: 75px; width: 175px;" src="get_image.php?id='.$row['icon_id'].'"/>
						</td>
						<td>
							<label style="width: 90%; height: 30px;font-weight: bold; font-size: 40px;">'.$row['job_title'].'</label>
						</td>
						<td>
							<button onclick="window.location.href=\'employer_jobs.php\'" style="width: 90%; height: 30px;">Go Back</button>
						</td>
					</tr>
					<tr>
						<td>
							<label style="width: 90%; height: 30px;font-weight: bold; font-size: 40px;">'.$company_name.'</label>
						</td>
					</tr>
				</table>
			</div>

			<div id="abc" style="display: none; margin: 20px; border: 5px solid black;">
				<div id="popupContact" style="padding: 15px; vertical-align: center;text-align: center;">
					<form action="submit_application.php" id="form" method="post" name="form" enctype="multipart/form-data">
						<img src="" onclick="div_hide()"/>
						<input type="hidden" id="job_id" name="job_id" value='.$id.'>
						Resume: <input id="resume" name="resume" placeholder="resume" type="file">
						Cover letter: <input id="cover_letter" name="cover_letter" placeholder="cover_letter" type="file">
						<a href="javascript:%20check_empty()" id="submit">Submit</a>
					</form>
				</div>
			</div>

			<div class="jobDetails">
				<table>
					<tr class="header">
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Job Description:</label></td>
						<td>
							<label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Deadline:</label>
						</td>
					</tr>
					<tr>
						<td><label>'.$row['job_description'].'</label></td>
						<td>
							<label>'.$row['expire_date'].'</label></td>
						</td>
					</tr>
					<tr>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Qualifications:</label></td>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Research Area:</label></td>
					</tr>
					<tr>
						<td><label>'.$row['qualifications'].'</label></td>
						<td>
							<label>'.$row['research_area'].'</label>
						</td>
					</tr>
					<tr>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Responsibilities:</label></td>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Degree Level:</label></td>
					</tr>
					<tr>
						<td><label>'.$row['responsibility'].'</label></td>
						<td>
							<label>'.$row['degree_level'].'</label>
						</td>
					</tr>
					<tr>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Location:</label></td>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Min GPA:</label></td>
					</tr>
					<tr>
						<td><label>'.$row['location'].'</label></td>
						<td>
							<label>'.$row['min_gpa'].'</label>
						</td>
					</tr>
					<tr>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Work Term:</label></td>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Work Authorization:</label></td>
					</tr>
					<tr>
						<td><label>'.$row['work_term'].'</label</td>
						<td><label>'.$row['work_authorization'].'</label></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Desired Start Date:</label></td>
						<td><label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">Abstract:</label></td>
					</tr>
					<tr>
						<td><label>'.$row['start_date'].'</label></td>
						<td>
							<label style="text-w">'.$row['abstract'].'</label>
						</td>
					</tr>
					<tr>
						<td>
							<label style="font-weight: bold; font-size: 20px; text-decoration: underline; ">
								Security Clearance:
							</label>
						</td>
					</tr>
					<tr>
						<td>
							<label>'.$row['security_clearance'].'</label>
						</td>
					</tr>
				</table>
			</div>'
			?>
		</div>
		<div id= "createJobForm">

		</div>
	</div>
</div>
<div class="footer">
	<p>footer items that we need to copy from careerbuzz</p>
	<a href="somelink.edu">some link</a>
</div>
</body>

</html>
