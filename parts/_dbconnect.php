<?php
$server="localhost";
$username="root";
$password="";
$db="student_registration_rkmgec";

$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    echo "Failed To Connect With DB";
}