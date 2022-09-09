<?php
include '../parts/_dbconnect.php';
require 'vendor/autoload.php';

// require ("vendor/autoload.php");
$sql = "SELECT * FROM `registration`";
$result = mysqli_query($conn, $sql);
?>



<?php
if (mysqli_num_rows($result) > 0) {
    $hmtl = '<table class="table table-striped table-bordered table-responsive">
	<thead>
	<tr>
	  <th scope="col">Sl</th>
	  <th scope="col">Roll</th>
	  <th scope="col">Name</th>
	  <th scope="col">Gender</th>
	  <th scope="col">Dept.</th>
	  <th scope="col">Father\'s Name</th>
	  <th scope="col">Mother\'s Name</th>
	  <th scope="col">Alloted Category</th>
	  <th scope="col">Original Category</th>
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
	</thead>
	<tbody>
	<tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $hmtl .= '<th scope="row">' . $row['sl'] . '</th>
		<td>' . $row['roll'] . '</td>
		<td>' . $row['name'] . '</td>
		<td>' . $row['gender'] . '</td>
		<td>' . $row['dept'] . '</td>
		<td>' . $row['fname'] . '</td>
		<td>' . $row['mname'] . '</td>
		<td>' . $row['acat'] . '</td>
		<td>' . $row['ocat'] . '</td>
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
    }
    $hmtl .= '
	</tbody>
	</table>';


} else {
    echo "<h1>No Data Found</h1>";
    exit();
}
$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml($hmtl);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A2', 'portrait');

// Render the HTML as PDF
$dompdf->render();

//file name
$file = time() . ".pdf";
// Output the generated PDF to Browser
$dompdf->stream($file);
