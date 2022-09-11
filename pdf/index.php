<?php
include '../parts/_dbconnect.php';
require 'vendor/autoload.php';

// require ("vendor/autoload.php");
$sql = "SELECT * FROM `registration`";
$result = mysqli_query($conn, $sql);
$sl = 1;

?>
<!doctype html>
<html lang="en">

<head>
	<title>Preview</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	

	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$dept=$_POST['dept'];
		$ocat=$_POST['ocat'];
		$gender=$_POST['gender'];

		if($ocat=="all" && $gender=="all"){
			$specSql="SELECT * FROM `registration` where `dept`='$dept'";
			$res=mysqli_query($conn,$specSql);
		echo '<div class="text-center my-2 ">
		<form method="POST" action="specific.php/?dept='.$dept.'">
		<input class="btn btn-primary text-white" type="submit" style="cursor:pointer;" name="download" value="Download" readonly></input>
		</form> 
		<!--<a href="specific.php" class="btn btn-primary">Donwload All</a> -->
		</div>';
			// echo $ocat, $gender, $dept, "1";
			}
		else if($ocat=="all"){
			$specSql="SELECT * FROM `registration` where `dept`='$dept' and `gender`='$gender'";
			$res=mysqli_query($conn,$specSql);
			echo '<div class="text-center my-2 ">
		<form method="POST" action="specific.php/?dept='.$dept.'&gender='.$gender.'">
		<input class="btn btn-primary text-white" type="submit" style="cursor:pointer;" name="download" value="Download" readonly></input>
		</form> 
		</div>';
			// echo $ocat, $gender, $dept, "2";
		}
		else if($gender=="all"){
			$specSql="SELECT * FROM `registration` where `dept`='$dept' and `ocat`='$ocat'";
			$res=mysqli_query($conn,$specSql);
			echo '<div class="text-center my-2 ">
		<form method="POST" action="specific.php/?dept='.$dept.'&ocat='.$ocat.'">
		<input class="btn btn-primary text-white" type="submit" style="cursor:pointer;" name="download" value="Download" readonly></input>
		</form> 
		</div>';
			// echo $ocat, $gender, $dept, "3";
		}
		else{
			$specSql="SELECT * FROM `registration` where `dept`='$dept' and `gender`='$gender' and `ocat`='$ocat'";
			$res=mysqli_query($conn,$specSql);
			echo '<div class="text-center my-2 ">
		<form method="POST" action="specific.php/?dept='.$dept.'&ocat='.$ocat.'&gender='.$gender.'">
		<input class="btn btn-primary text-white" type="submit" style="cursor:pointer;" name="download" value="Download" readonly></input>
		</form> 
		</div>';
			// echo $ocat, $gender, $dept, "4";
		}

		if (mysqli_num_rows($res) > 0) {
			
			echo '<h1 class="my-1">Total number of registration: ' . mysqli_num_rows($res) . '</h1>';
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
	while ($row = mysqli_fetch_assoc($res)) {
				$hmtl .= '<th scope="row">' . $sl . '</th>
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
				$sl++;
			}
			$hmtl .= '</tr>
	</tbody>
	</table>';
			// $mpdf->WriteHTML($hmtl);
			// $file = time() . ".pdf";
			// $mpdf->output($file, 'D');
		} else {
			echo "<h1>No Data Found</h1>";
			exit();
		}
		echo $hmtl;
		// if(array_key_exists('download', $_POST)) {
        //     download();
        // }

		// function download()
		// {
		// 	global $hmtl;
			// reference the Dompdf namespace
			// instantiate and use the dompdf class
			// $dompdf = new Dompdf\Dompdf();
			// $dompdf->loadHtml($hmtl);

			// // (Optional) Setup the paper size and orientation
			// $dompdf->setPaper('A4', 'portrait');

			// // Render the HTML as PDF
			// $dompdf->render();

			// //file name
			// $file = time() . ".pdf";
			// // Output the generated PDF to Browser
			// $dompdf->stream($file);
		// }
	
	} else {
		echo '<div class="text-center my-2 ">
		<!-- <form method="POST">
	<input class="btn btn-primary text-white" type="submit" style="cursor:pointer;" name="download" value="download" readonly></input>
	</form> -->
		<a href="download.php" class="btn btn-primary">Donwload All</a>
	</div>';

		if (mysqli_num_rows($result) > 0) {
			echo '<h1 class="my-1">Total number of registration: ' . mysqli_num_rows($result) . '</h1>';
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
				$hmtl .= '<th scope="row">' . $sl . '</th>
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
				$sl++;
			}
			$hmtl .= '</tr>
	</tbody>
	</table>';
	function download()
		{
			global $hmtl;
			// reference the Dompdf namespace
			// instantiate and use the dompdf class
			$dompdf = new Dompdf\Dompdf();
			$dompdf->loadHtml($hmtl);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portrait');

			// Render the HTML as PDF
			$dompdf->render();

			//file name
			$file = time() . ".pdf";
			// Output the generated PDF to Browser
			$dompdf->stream($file);
		}
			// $mpdf->WriteHTML($hmtl);
			// $file = time() . ".pdf";
			// $mpdf->output($file, 'D');
		} else {
			echo "<h1>No Data Found</h1>";
			exit();
		}

		echo $hmtl;


		// function download()
		// {
		// 	global $hmtl;
		// 	// reference the Dompdf namespace
		// 	// instantiate and use the dompdf class
		// 	$dompdf = new Dompdf\Dompdf();
		// 	$dompdf->loadHtml($hmtl);

		// 	// (Optional) Setup the paper size and orientation
		// 	$dompdf->setPaper('A4', 'portrait');

		// 	// Render the HTML as PDF
		// 	$dompdf->render();

		// 	//file name
		// 	$file = time() . ".pdf";
		// 	// Output the generated PDF to Browser
		// 	$dompdf->stream($file);
		// }
	}
	?>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>