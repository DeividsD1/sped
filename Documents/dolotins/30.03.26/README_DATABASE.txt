===== DATABASE SETUP INSTRUCTIONS =====

HOW TO RUN THE DATABASE:

METHOD 1: Using phpMyAdmin (Easiest)
------------------------------------
1. Start XAMPP Control Panel
2. Click "Start" for Apache and MySQL modules
3. Click "Admin" button next to MySQL (opens phpMyAdmin)
4. Click "Import" tab at the top
5. Click "Choose File" and select "database.sql"
6. Scroll down and click "Go" button
7. Database and table will be created automatically!

METHOD 2: Using Command Line
-----------------------------
1. Start XAMPP and ensure MySQL is running
2. Open Command Prompt or PowerShell
3. Navigate to this folder:
   cd C:\xampp\htdocs\sped\Documents\dolotins\30.03.26
4. Run this command:
   C:\xampp\mysql\bin\mysql.exe -u root < database.sql

METHOD 3: Manual MySQL Commands
--------------------------------
1. Start XAMPP MySQL
2. Open Command Prompt
3. Run: C:\xampp\mysql\bin\mysql.exe -u root
4. Copy and paste content from database.sql

TESTING THE SETUP:
------------------
1. Open browser and go to:
   http://localhost/sped/Documents/dolotins/30.03.26/index.php
2. Try registering a test user
3. Check registered users at:
   http://localhost/sped/Documents/dolotins/30.03.26/view_users.php

TROUBLESHOOTING:
----------------
- If you get "Unknown database" error:
  Make sure MySQL is running in XAMPP
  Import database.sql file again

- If you get connection error:
  Check that XAMPP MySQL module is started
  Username should be "root" with no password (default XAMPP)

NOTES:
------
- Passwords are hashed using PHP password_hash() for security
- Database name: sped_db
- Table name: users
- Default MySQL credentials: user=root, password=(empty)
