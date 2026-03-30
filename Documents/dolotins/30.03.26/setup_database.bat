@echo off
echo ================================
echo DATABASE SETUP FOR SPED PROJECT
echo ================================
echo.

echo Checking if MySQL is installed...
if not exist "C:\xampp\mysql\bin\mysql.exe" (
    echo ERROR: XAMPP MySQL not found!
    echo Please install XAMPP first.
    pause
    exit
)

echo.
echo Creating database and table...
C:\xampp\mysql\bin\mysql.exe -u root < database.sql

if %errorlevel% equ 0 (
    echo.
    echo ================================
    echo SUCCESS! Database setup complete!
    echo ================================
    echo.
    echo Database: sped_db
    echo Table: users
    echo.
    echo You can now:
    echo 1. Open http://localhost/sped/Documents/dolotins/30.03.26/index.php
    echo 2. Register users through the form
    echo 3. View users at view_users.php
    echo.
) else (
    echo.
    echo ERROR: Failed to create database!
    echo Make sure MySQL is running in XAMPP Control Panel.
    echo.
)

pause
