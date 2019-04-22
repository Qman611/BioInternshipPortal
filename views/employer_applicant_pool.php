<!DOCTYPE html>
<html>
<head>
<title>Bio Internship Portal</title>
<link rel="stylesheet" href="users.css"/>
<link rel="stylesheet" href="applicantTable.css"/>
</head>
<body>
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
   //echo 'connection ok';

    $sql = "SELECT * FROM job_posting_table WHERE employer_id = '1234'";
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
				<button onclick="window.location.href='employer_jobs.php'" class="sidePanelRow">Jobs</button>
				<button class="sidePanelRow">Applicants</button>
				<button onclick="window.location.href='employer_settings.php'" class="sidePanelRow">Settings</button>
				<a href="BIP_login.php" style = "margin-top: 30px;" class="button">log out </a>
			</div>
			<div id = infoPanel class = "mainScreen">
				<h1 align = "center" style="font-size: 40px; color: #F0EAD6">Pool of Applicants</h1>
				<?php
					while($row = mysqli_fetch_assoc($retval)) {

						echo '
						<div id="applicantPool" class="card">
							<button class="jobDropDown">'.$row['job_title'].' &#40;Job ID: '.$row['job_id'].'&#41;
								<i>&#9660;</i>
							</button>
                            <div class="applicantDropDownContent" style="display: block;">
                                <table>';

                        $sql = "SELECT * FROM job_application_table WHERE job_id = '{$row['job_id']}'";
                        $applicants = mysqli_query( $conn, $sql);

                       //echo "got back: ".mysqli_num_rows($retval)."rows </br>";

                        if(!$applicants) {
                           die('Could not get data: ' . mysqli_error($conn));
                        }
                        $count = 0;
                        echo '<tr>
                                    <td class="tdCount">Application<br>Position </td>
                                    <td class="tdName">Applicant Name</td>
                                    <td class="tdStatus"></td>
                                    <td class="tdResume">
                                        <button type="submit">Download All<br>Resumes</button>
                                    </td>
                                    <td class="tdCoverLetter">
                                        <button type="submit">Download All<br>Cover Letters</button>
                                    </td>
                                    <td class="tdAccept"></td>
                                    <td class="tdAccept"></td>
                                </tr>';
                        while ($row2 = mysqli_fetch_assoc($applicants)){
                            $sql = "SELECT * FROM user_table WHERE user_id = '{$row2['student_id']}'";
                            $user = mysqli_fetch_assoc(mysqli_query( $conn, $sql));
                            $count = $count + 1;

                            echo'

								<tr>
									<td class="tdCount">'.$count.'</td>
									<td class="tdName">'.$user['first_name'].' '.$user['last_name'].'</td>
                                    <td class="tdStatus">'.$row2['application_status'].'</td>
									<td class="tdResume">
                                        <a href="get_resume.php?id='.$row2['resume_id'].'">
                                            <button type="submit">View Resume</button>
                                        </a>
                                    </td>
									<td class="tdCoverLetter">
                                        <a href="get_cover_letter.php?id='.$row2['resume_id'].'">
                                            <button type="submit">View Cover Letter</button>
                                        </a>
                                    </td>
                                    <td class="tdAccept">
                                        <form action="update_application_status.php" id="form" method="post" name="form">
                                            <input type="hidden" id="id" name="id" value='.$row2['job_application_id'].'>
                                            <input type="hidden" id="update" name="update" value="Accepted">
                                            <button type="submit">Accept</button>
                                        </form>
                                    </td>
                                    <td class="tdAccept">
                                        <form action="update_application_status.php" id="form" method="post" name="form">
                                            <input type="hidden" id="id" name="id" value='.$row2['job_application_id'].'>
                                            <input type="hidden" id="update" name="update" value="Rejected">
                                            <button type="submit">Reject</button>
                                        </form>
                                    </td>
								</tr>';
                        }
                        echo '</table>
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

<script type="text/javascript">
	// Make each drop down be able to show/hide its contents after loading
	var dropDowns = document.querySelectorAll('.jobDropDown');
	for (var i= 0; i < dropDowns.length; i++) {
		dropDowns[i].addEventListener("click", function showApplicants() {
			var div = this.parentElement.getElementsByClassName('applicantDropDownContent')[0];
			if (div.style.display === 'block') {
				div.style.display = 'none';
			} else {
				div.style.display = 'block';
			}
		}, false);
	}
</script>
</body>

</html>
