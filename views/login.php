<!DOCTYPE html>
<html>
	<head>
		<title>Biology Internship Portal</title>
		<link rel="stylesheet" href="users2.css"/>
	</head>
	<body>
        <form method="post" action="login_backend.php">
          <select name="username">
          
            <?php
                $dbhost = 'localhost:3306';
                $dbuser = 'portal_user';
                $dbpass = 'portal-password';

                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'BioInternshipPortal_db');

                if(mysqli_connect_errno() ) {
                   die('Could not connect: ' . mysqli_connect_error());
                }
               //echo 'connection ok';

                $sql = "SELECT * FROM user_table";
                $retval = mysqli_query( $conn, $sql);
                while($row = mysqli_fetch_assoc($retval)) {
                    $name = "";
                    if(strlen($row['company_name']) > 0) {
                        $name = $row['company_name'];
                    }elseif (strlen($row['first_name']) > 0) {
                        $name = $row['first_name'];
                    } else {
                        $name = $row['user_id'];
                    }
                    
                    echo '<option value="'.$row['user_id'].'">'.$name.'</option>';
                }
            ?>
            <option value="">LOGOUT</option>
          </select>
          <input type="submit" value="Login"/>
        </form>
    </body>
</html>