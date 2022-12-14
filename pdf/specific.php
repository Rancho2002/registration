<?php

include '../parts/_dbconnect.php';
require 'vendor/autoload.php';

if(isset($_GET['dept'])){
$deptS=$_GET['dept'];
$sql = "SELECT * FROM `registration` where `dept`='$deptS'";
$result = mysqli_query($conn, $sql);
}
if(isset($_GET['dept']) && isset($_GET['gender'])){
	$deptS=$_GET['dept'];
	$genderS=$_GET['gender'];
	$sql = "SELECT * FROM `registration` where `dept`='$deptS' and `gender`='$genderS'";
	$result = mysqli_query($conn, $sql);
}
if(isset($_GET['dept']) && isset($_GET['ocat'])){
	$deptS=$_GET['dept'];
	$ocatS=$_GET['ocat'];
	$sql = "SELECT * FROM `registration` where `dept`='$deptS' and `ocat`='$ocatS'";
	$result = mysqli_query($conn, $sql);
}
if(isset($_GET['dept']) && isset($_GET['ocat']) && isset($_GET['gender'])){
	$deptS=$_GET['dept'];
	$ocatS=$_GET['ocat'];
	$genderS=$_GET['gender'];
	$sql = "SELECT * FROM `registration` where `dept`='$deptS' and `ocat`='$ocatS' and `gender`='$genderS'";
	$result = mysqli_query($conn, $sql);
}
$sl=1;
?>



<?php
if (mysqli_num_rows($result) > 0) {
    $hmtl = '
    <style>
    table,th, td{
        font-size:15px;
        border:1px solid black;
        border-collapse: collapse;
    }
    th{
        font-size:16px;
    }
    td{
        padding:8px;
        font-size:20px;
    }
    </style>
    <table class="table">
	
	<tr>
	<th scope="col">Sl</th>
	<th scope="col">Roll</th>
	<th scope="col">Name</th>
	<th scope="col">Year</th>
	<th scope="col">Gender</th>
	<th scope="col">Dept.</th>
	<th scope="col">Father\'s Name</th>
	<th scope="col">Mother\'s Name</th>
	<th scope="col">Alloted Category</th>
	<th scope="col">Original Category</th>
	<th scope="col">Domicile</th>
	<th scope="col">Date of Birth</th>
	<th scope="col">Alloted Rank</th>
	<th scope="col">GMR</th>
	<th scope="col">Date of Admission</th>
	<th scope="col">Mobile</th>
	<th scope="col">Guardian Mobile</th>
	<th scope="col">Address</th>
	<th scope="col">Aadhar No.</th>
	<th scope="col">Email ID</th>
	<th scope="col">Fees(SBI)</th>
	<th scope="col">Fees(CBI)</th>
	</tr>
	';
    while ($row = mysqli_fetch_assoc($result)) {
        $hmtl .= '<tr>
        <th scope="row">' . $sl . '</th>
		<td>' . $row['roll'] . '</td>
	<td>' . $row['name'] . '</td>
	<td>' . $row['year'] . '</td>
	<td>' . $row['gender'] . '</td>
	<td>' . $row['dept'] . '</td>
	<td>' . $row['fname'] . '</td>
	<td>' . $row['mname'] . '</td>
	<td>' . $row['acat'] . '</td>
	<td>' . $row['ocat'] . '</td>
	<td>' . $row['domicile'] . '</td>
	<td>' . $row['dob'] . '</td>
	<td>' . $row['alotrank'] . '</td>
	<td>' . $row['gmr'] . '</td>
	<td>' . $row['doa'] . '</td>
	<td>' . $row['mob'] . '</td>
	<td>' . $row['gmob'] . '</td>
	<td>' . $row['address'] . '</td>
	<td>' . $row['aadhar'] . '</td>
	<td>' . $row['mail'] . '</td>
	<td>' . $row['fsbi'] . '</td>
	<td>' . $row['fcbi'] . '</td>
		</tr>
		';
		$sl++;
    }
    $hmtl .= '</table>';


} else {
    echo "<h1>No Data Found</h1>";
    exit();
}
$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml($hmtl);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A2', 'landscape');

// Render the HTML as PDF
$dompdf->render();

//file name
$file = time() . ".pdf";
// Output the generated PDF to Browser
$dompdf->stream($file);

