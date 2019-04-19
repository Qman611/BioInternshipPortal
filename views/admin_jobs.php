<!DOCTYPE html>
<html>
	<head>
		<title>Biology Internship Portal</title>
		<link rel="stylesheet" href="users2.css"/>
	</head>
	<body>
		<div style="width: 100%; height: 100vh;min-width: 500px;" id = "container">
			<div id = "row">
					<div id = "sidePanel" class="sidebar">
						<h1>Biology Internship Portal</h1>
						<p>Dr. Emily Weigel</p>
						<button class="sidePanelRow">Jobs</button>
						<button onclick="window.location.href='user_list.html'" class="sidePanelRow">Users</button>
						<button onclick="window.location.href='admin_settings.html'" class="sidePanelRow">Settings</button>
						<a href="BIP_login.html" style = "margin-top: 30px;" class="button">log out </a>
					</div>
					<div id = infoPanel class = "mainScreen">
						<h1 align = "center" style="font-size: 40px; color: #F0EAD6">Find an Internship</h1>

						<span align="center">
							<form>
								<h2 style="display:inline;">Filter by:&nbsp</h2>
								<input type="text" name="keywords" placeholder="Keywords" size="50" style="height: 35px">
								<input type="text" name="location" placeholder="Location" size="30" style="height: 35px">
								<input type="submit" value="Submit">
							</form>
						</span>

						</br></br>
						<table align="center">
							<tbody>

<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 'on');
   $dbhost = 'localhost:3306';
   $dbuser = 'portal_user';
   $dbpass = 'portal-password';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

   if(mysqli_connect_errno() ) {
      die('Could not connect: ' . mysqli_connect_error());
   }

   $sql = "SELECT * FROM job_posting_table ";
   $retval = mysqli_query( $conn, $sql);

   if(!$retval) {
      die('Could not get data: ' . mysqli_error($conn));
   }

   while($row = mysqli_fetch_assoc($retval)) {

	    $sql = 'SELECT company_name FROM user_table WHERE user_id ='.$row['employer_id'];
	    $company_name_query = mysqli_query($conn, $sql);
	    if ($company_name_query) {
	        $result = mysqli_fetch_assoc($company_name_query);
	        $company_name = $result['company_name'];
	    } else {
	        $company_name = "Thermo Fisher Scientific";
	    }

	    echo '<tr align="center">
                <td class="card">
                    <div class="jobImage">
                        <a href="admin_job_view.php?id='.$row['job_id'].'">
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
