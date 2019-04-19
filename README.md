# BioInternshipPortal
Georgia Tech Biology Internship Portal

<<<<<<< HEAD


=======
>>>>>>> parent of 769252f... Revert "Merge branch 'master' of https://github.com/Qman611/BioInternshipPortal"
## Release Notes version BioInternshipPortal 1.0
NEW FEATURES:
- [x] Created login page for users to sign in
- [x] Implemented user profiles with cookies for maintaining sign-in
- [x] Implemented Student view with the following:
	- [x] 'View Jobs' Page to view all available jobs
	- [x] 'Job Listing' Page to view and/or apply to a specific job listing
	- [x] 'View Offers' Page to view all available offers
	- [x] 'Settings' Page to toggle notification settings specific to Student user types
- [x] Implemented Employer view with the following:
	- [x] 'View Jobs' Page to view all of my available jobs
	- [x] 'Job Listing' Page to view and/or edit a specific job listing
	- [x] 'New Job Listing' Page to create a new job listing
	- [x] 'View Applicants' Page to view all applicants to my available jobs and to accept/reject those applicants
	- [x] 'Settings' Page to toggle notification settings specific to Employer user types
- [x] Implemented Admin view with the following:
	- [x] 'View Users' Page to view all users registered for the system and/or revoke their access to the system
	- [x] 'View Jobs' Page to view all available jobs
	- [x] 'Job Listing' Page to view and/or edit a specific job listing
	- [x] 'Settings' Page to toggle notification settings specific to Admin user types
- [x] Implemented MariaDB database to store:
	- [x] User data
	- [x] Student resumes and cover letters
	- [x] Job Listings
	- [x] Job Applications
	- [x] Notifications

BUG FIXES:
<<<<<<< HEAD
- [ ] All buttons now navigate to the correct page
- [x] Fixed styling issue causing buttons to appear different on different pages
- [x] Admin was being transferred to a student profile when clicking on a job listing

KNOWN BUGS:
- [ ] Data is not secure. Can be remedied by hosting on OIT servers
- [ ] Stylings are not all uniform
=======
- [x] All buttons now navigate to the correct page
- [x] Fixed styling issue causing buttons to appear different on different pages

KNOWN BUGS:
>>>>>>> parent of 769252f... Revert "Merge branch 'master' of https://github.com/Qman611/BioInternshipPortal"
- [ ] Edit job listing for employer does not work

FUTURE WORK:
- [ ] Implement Georgia Tech CAS Login system
- [ ] Coordinate with Georgia Tech Registrar's Office to obtain data usage permissions
- [ ] Collaborate with Georgia Tech OIT to receive server space for data storage and web hosting
- [ ] Implement Notifications that send alerts to appropriate email accounts associated with users' Georgia Tech accounts
<<<<<<< HEAD
- [ ] Create a student applicant profile page for employers to view
- [ ] Receive permission to implement Georgia Tech copyrighted web design style
- [ ] Allow Employers and/or Admin to duplicate job listing
- [ ] Allow Students to view status of jobs applied to
- [ ] Allow Students accept/reject offers
- [ ] Allow Admin to ban users
- [ ] Allow Admin to xend announcements to groups of users
- [ ] Allow Admin to view statistics on site usage
- [ ] Docu-sign integration
- [ ] Filter job listings

## Install Guide BioInternshipPortal 1.0
PRE-REQUISITES
	A linux machine capable of running PHP and MariaDB

DEPENDENCIES
	1. PHP of version 7.2 or higher
	2. MariaDB of version 10.2 or higher
	3. PhpMyAdmin of version 4.6.6 or higher

DOWNLOAD INSTRUCTIONS
	Download the repository from Github to th intended download location

INSTALLATION
	1. Copy files from view folder to {/var/www/html} on the server
	2. Set up MariaDB on port 3306 with username of {portal_user} and password {portal-password}
	3. Import {BioInternshipPortal_db.sql} into PhpMyAdmin. This will set up the tables with test data.
	4. Verify proper operations of the system with the provided test data
	5. (Optional) Change the database access credentials in PhpMyAdmin based on security requirements
	6. Delete the test data from all tables using PhpMyAdmin

RUNNING APPLICATION
	Access the server on port 80 using a web browser

TROUBLESHOOTING
	Server not responding on port 80:
		* Make sure PHP is actually running
	Database connection issues:
		* Make sure MariaDB is running on the correct port with the correct credentials
		* PhpMyAdmin can also be used to verify the status of the database

=======

## Install Guide BioInternshipPortal 1.0
PRE-REQUISITES

DEPENDENCIES

DOWNLOAD INSTRUCTIONS

BUILD INSTRUCTIONS

INSTALLATION

RUNNING APPLICATION
>>>>>>> parent of 769252f... Revert "Merge branch 'master' of https://github.com/Qman611/BioInternshipPortal"

