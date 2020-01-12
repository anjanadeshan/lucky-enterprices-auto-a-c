<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'ostiwebdb';

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_errno) {
    die("Database connection error" . $conn->connect_error);
}
//echo 'Successfully Connected';
