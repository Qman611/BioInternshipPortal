<!DOCTYPE html>
<html>
    <head>
        <title>Bio Internship Portal</title>
        <link rel="stylesheet" href="users.css"/>
    </head>
    <body>
        <div style="width: 100%; height: 100vh;min-width: 500px;" id = "container">
            <div id = "row">
                    <div id = "sidePanel" class="sidebar">
                        <h1>Biology Internship Portal</h1>
                        <p>Dr. Emily Weigel</p>
                        <button onclick="window.location.href='admin_jobs.php'" class="sidePanelRow">Jobs</button>
                        <button onclick="window.location.href='user_list.php'" class="sidePanelRow">Users</button>
                        <button class="sidePanelRow">Settings</button>
                        <a href="BIP_login.html" style = "margin-top: 30px;" class="button">log out </a>
                    </div>
                    <div id = infoPanel class = "mainScreen">
                        <h1 align = "center" style="font-size: 40px; color: #F0EAD6"> Settings</h1>
                        <h2 align = "center" style="font-size: 30px; color: #F0EAD6">Notifications</h2>
                        <h3 align ="left" style="font-size: 20px;color: #F0EAD6;margin-left: 40px">Notify me for:</h3>
                        <label for="checkbox">
                        <input type="checkbox" name="newJobs" value="Bike" style="margin-left: 60px"> Job Listing Edited<br>
                        <input type="checkbox" name="newOffers" value="Car" style="margin-left: 60px"> New Job Listing<br>
                        <input type="checkbox" name="rejections" value="Boat" style="margin-left: 60px"> Position has been Fulfilled<br>
                        <input type="checkbox" name="rejections" value="Boat" style="margin-left: 60px"> New Employee Registration<br>
                        <h3 align ="left" style="font-size: 20px;color: #F0EAD6;margin-left: 40px">Send me updates:</h3>
                        <label for="checkbox">
                        <input type="checkbox" name="realTime" value="Bike" style="margin-left: 60px"> Real-time<br>
                        <input type="checkbox" name="daily" value="Car" style="margin-left: 60px"> Daily<br>
                        <input type="checkbox" name="weekly" value="Boat" style="margin-left: 60px"> Weekly<br>
                    </div>
            </div>
        </div>

        <div class="footer">
            <p>footer items that we need to copy from careerbuzz</p>
            <a href="somelink.edu">some link</a>
        </div>
    </body>

</html>
