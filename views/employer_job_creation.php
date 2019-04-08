<!DOCTYPE html>
<html>
<head>
<title>Bio Internship Portal</title>
<link rel="stylesheet" href="users.css"/>
</head>
<body>
<?php
    if (array_key_exists('username', $_COOKIE) && array_key_exists('usertype', $_COOKIE)) {
        echo sprintf("Logged-in user: %s",(string)$_COOKIE['username']);
        if ((string)$_COOKIE['usertype'] == 'student') {
            echo "Student can't post job";
            $url = 'login.php';
            header('Location: ' . $url, true, 303);
            die();
        }
        
    } else {
        echo "Not logged in";
        $url = 'login.php';
        header('Location: ' . $url, true, 303);
        die();
    }
?>

<div style="width: 100%; height: 100vh;min-width: 500px;" id = "container">
	<div id = "row">
		<div id = "sidePanel" class="sidebar">
			<h1>Biology Internship Portal</h1>
            <p>D'Arcy Wentworth Roper</p>
			<button onclick="window.location.href='employer_jobs.html'" class="sidePanelRow">Jobs</button>
			<button onclick="window.location.href='applicant_pool.html'" class="sidePanelRow">Applicants</button>
			<button onclick="window.location.href='employer_settings.html'" class="sidePanelRow">Settings</button>
			<a href="BIP_login.html" style = "margin-top: 30px;" class="button">log out </a>
		</div>
		<div id = infoPanel class = "mainScreen">
			<div style="display: table; border-collapse: collapse; width: 100%;">
				<div style = "display: table-row; border-bottom: 2px solid black">
					<div id = "cell" style = "width: 80%; vertical-align: center;">
					<h1 style="font-size: 40px; color: #F0EAD6; display: table-cell; width: 100%; text-align: center;">&#40New&#41 Job Listing</h1>
					</div>
				</div>
			</div>
            <form action="post_job.php" method="post" enctype="multipart/form-data">
			<div style = "display: table-row; width: 100%;">
				<table style="width:100%; border-bottom: 2px solid black;">
					<tr>
						<td rowspan="2">
							<!--img style = "height: 75px; width: 175px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/US_CDC_logo.svg/1200px-US_CDC_logo.svg.png"/-->
                            <input type="file" name="icon_upload"/>
						</td>
						<td>
							<input type="text" name="pos_title" placeholder = "Enter Position Title"></input>
						</td>
						<td>
							<button type ="submit" onclick="window.location.href='employer_jobs.html'">Publish</button>
						</td>
						<td>
							<button onclick="window.location.href='employer_jobs.html'">save draft</button>
						</td>
					</tr>
					<tr>
						<!--td>
							<input type="text" name="employer_id" placeholder = "Enter Employer ID"></input>
						</td-->
						<td>
							<button onclick="window.location.href='employer_jobs.html'">Discard</button>
						</td>
						<td>
							<button>Duplicate</button>
						</td>
					</tr>
				</table>
			</div>
			<div >
            
				<table>
					<tr>
						<td><label>Job Description</label></td>
						<td>
							<label>Deadline</label>
						</td>
					</tr>
					<tr>
						<td><input type="text" name="job_desc" placeholder="Text input"/></td>
						<td>
							<label><input type="date" name="deadline" /></td>
						</td>
					</tr>
					<tr>
						<td><label>Qualifications</label></td>
						<td><label>Research Area</label></td>
					</tr>
					<tr>
						<td><input type="text" name="qualification" placeholder="Text input"/></td>
						<td><input type="text" name="research_area" placeholder="Text input"/></td>
					</tr>
					<tr>
						<td><label>Responsibilities</label></td>
						<td><label>Degree Level</label></td>
					</tr>
					<tr>
						<td><input type="text" name="responsibility" placeholder="Text input"/></td>
						<td>
							<select name = "degree_level">
								<option>Undergraduate</option>
								<option>Graduate</option>
								<option>Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Location</label></td>
						<td><label>Min GPA</label></td>
					</tr>
					<tr>
						<td><input type="text" name="location" placeholder="Text input"/></td>
						<td><input  type="number" step="0.01" min="0.00" max="4.00" name="min_gpa" placeholder="Text input"/></td>
					</tr>
					<tr>
						<td><label>Work Term</label></td>
						<td><label>Work Authorization</label></td>
					</tr>
					<tr>
						<td><input type="text" name="work_term" placeholder="Text input"/></td>
						<td>
							<select name = "work_auth">
								<option>No Restriction</option>
								<option>US Citizen</option>
								<option>Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Desired Start Date</label></td>
						<td><label>Abstract</label></td>
					</tr>
					<tr>
						<td><input type="date" name="start_date" placeholder="Text input"/></td>
						<td>
							<textarea type="text" name="abstract" placeholder="140 Character Description"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<select name = "security">
								<option> Security Clearance </option>
							</select>
						</td>
					</tr>
				</table>
			</div>
		</div>
            </form>
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
