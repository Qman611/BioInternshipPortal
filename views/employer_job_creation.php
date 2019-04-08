<!DOCTYPE html>
<html>
<head>
<title>Bio Internship Portal</title>
<link rel="stylesheet" href="users.css"/>
<link rel="stylesheet" href="job_listing.css"/>
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
			<div style = "display: table; width: 100%;">
				<table style="width:100%; border-bottom: 2px solid black;">
					<tr>
						<td rowspan="2" style="width:200px;">
							<!--img style = "height: 75px; width: 175px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/US_CDC_logo.svg/1200px-US_CDC_logo.svg.png"/-->
                            <input type="file" name="icon_upload"/>
						</td>
						<td>
							<input type="text" name="pos_title" placeholder = "Enter Position Title"style="width: 90%; height: 30px;"></input>
						</td>
						<td style="width: 15%">
							<button type ="submit" onclick="window.location.href='employer_jobs.html'" class="acceptButton">Publish</button>
						</td>
						<td style="width: 15%">
							<button onclick="window.location.href='employer_jobs.html'" class="acceptButton">Discard</button>
						</td>
					</tr>
				</table>
			</div>
			<div class="container">
				<div id="containerLeft">
					<label class="criteriaHeader">Job Description</label>
					<textarea class="criteriaInfo" placeholder="Enter Text" rows="4"></textarea>
					
					<label class="criteriaHeader">Qualifications</label>
					<textarea class="criteriaInfo" placeholder="Enter Text" rows="4"></textarea>
					
					<label class="criteriaHeader">Responsibilities</label>
					<textarea class="criteriaInfo" placeholder="Enter Text" rows="4"></textarea>
					
					<label class="criteriaHeader">Location</label>
					<input class="criteriaInfo" placeholder="City, State, Country" style="height: 30px;"></input>
					
					<label class="criteriaHeader">Work Term</label>
					<textarea class="criteriaInfo" placeholder="Enter Text" rows="4"> </textarea>
					
					<label class="criteriaHeader">Desired Start Date</label>
					<input type="date" class="criteriaInfo" style="height: 30px;"></input>
					
					<label class="criteriaHeader">Security Clearance</label>
					<select class="criteriaInfo" style="height: 30px;">
						<option value="0">N/A</option>
						<option value="1">level 1</option>
						<option value="2">level 2</option>
						<option value="3">level 3</option>
						<option value="4">level 4</option>
					</select>
					
				</div>
				
				<div id="containerRight">
					<label class="criteriaHeader">Deadline to Apply</label>
					<input type="date" class="criteriaInfo" style="height: 30px;"></input>
					
					<label class="criteriaHeader">Research Area</label>
					<select class="criteriaInfo" style="height: 30px;">
						<option value="0">N/A</option>
						<option value="1">Type 1</option>
						<option value="2">Type 2</option>
						<option value="3">Type 3</option>
						<option value="4">Type 4</option>
					</select>
					
					<label class="criteriaHeader">Degree Level</label>
					<select class="criteriaInfo" style="height: 30px;">
						<option value="0">N/A</option>
						<option value="1">High School</option>
						<option value="2">Some College</option>
						<option value="3">Undergrad</option>
						<option value="4">Masters</option>
						<option value="4">PHD</option>
					</select>
					
					<label class="criteriaHeader">Minimum GPA</label>
					<input class="criteriaInfo" placeholder="Enter Value From 0.0 - 4.0"></input>
					
					<label class="criteriaHeader">Work Authorization </label>
					<input class="criteriaInfo" placeholder="Enter Text" ></input>
					
					<label class="criteriaHeader">Abstract</label>
					<textarea class="criteriaInfo" placeholder="Enter Text" rows="4" maxlength="140"></textarea>
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
