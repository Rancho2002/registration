<?php
include "../parts/_dbconnect.php";
$branch=['CSE','ECE','EE','ME','EE','CE'];
$gender=['M','F'];
$category=['GEN','SC','ST','OBC-A','OBC-B','pwd-GEN','pwd-SC','pwd-ST','pwd-OBC-A','pwd-OBC-B'];
$genCount=[];
$catCount=[];

$t=0;
$x=0;
$print=0;

for($i=0;$i<count($branch);$i++){
    $dept= $branch[$i];
    for($j=0;$j<count($gender);$j++){
        $gen=$gender[$j];
        $sql="SELECT * FROM `registration` where `dept`='$dept' and `gender`='$gen'";
        $result=mysqli_query($conn,$sql);
        $genCount[$t]=mysqli_num_rows($result);
        // echo $dept.' '.$gen.' '.$genCount[$t];
        // echo "<br>";
        // echo var_dump($genCount);
        // echo "<br>";
        $t++;
    }
}
// echo "done<br>";
for($i=0;$i<count($branch);$i++){
    $dept= $branch[$i];
    for($j=0;$j<count($category);$j++){
        $cat=$category[$j];
        $sql="SELECT * FROM `registration` where `dept`='$dept' and `ocat`='$cat'";
        $result=mysqli_query($conn,$sql);
        $catCount[$x]=mysqli_num_rows($result);
        // echo $category[$j].' '.$dept.' '.$catCount[$t];
        // echo "<br>";
        $x++;
    }
}

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
<style>
    .body{
        padding-top: 10px;
    }
</style>
<body>
<table class="table table-striped table-bordered ">
	<thead>
	<tr class="text-center">
    <th scope="col">Department</th>
	<th scope="col">M</th>
	<th scope="col">F</th>
	<th scope="col"></th>
	<?php 
    for($i=0;$i<count($category);$i++){
        echo '<th scope="col">'.$category[$i].'</th>';
    }
    ?>
    </tr>
	</thead>
	<tbody>
	
    <?php

    echo '
    <tr>
    <th scope="">CSE</th>
    ';
    for($i=0;$i<2;$i++)
        echo '<td>' . $genCount[$i] . '</td>';
    

    echo '<div style="margin: auto;"><td rowspan="6" style="vertical-align : middle;text-align:center;font-size:20px;font-weight:700;">Category wise divison</td></div>';

    for($i=0;$i<10;$i++){
            echo '<td>' . $catCount[$i] . '</td>';
    }
    echo '</th>
    </tr>';
    echo '<tr>
    <th scope="">ECE</th>
    ';
    for($i=2;$i<4;$i++){
                echo '<td>' . $genCount[$i] . '</td>';
    }
 
    for($i=10;$i<20;$i++){
            echo '<td>' . $catCount[$i] . '</td>';
    }
    echo '</th></tr>';
    echo '<tr>
    <th scope="">EE</th>
    ';
    for($i=4;$i<6;$i++){
                echo '<td>' . $genCount[$i] . '</td>';
    }
 
    for($i=20;$i<30;$i++){
            echo '<td>' . $catCount[$i] . '</td>';
    }
    echo '</th></tr>';
    echo '<tr>
    <th scope="">ME</th>
    ';
    for($i=6;$i<8;$i++){
                echo '<td>' . $genCount[$i] . '</td>';
    }
 
    for($i=30;$i<40;$i++){
            echo '<td>' . $catCount[$i] . '</td>';
    }
    echo '</th></tr>';
    echo '<tr>
    <th scope="">CE</th>
    ';
    for($i=8;$i<10;$i++){
                echo '<td>' . $genCount[$i] . '</td>';
    }
 
    for($i=40;$i<50;$i++){
            echo '<td>' . $catCount[$i] . '</td>';
    }
    echo '</th></tr>';