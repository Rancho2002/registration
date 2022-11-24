<?php
include "../parts/_dbconnect.php";
$roll = $_GET['roll'];
$result = mysqli_query($conn, "SELECT * from `registration` where `roll`='$roll'");
$list = mysqli_fetch_assoc($result);


$name = $list['name'];
$year = $list['year'];
$gender = $list['gender'];
$dept = $list['dept'];
$father = $list['fname'];
$mother = $list['mname'];
$acat = $list['acat'];
$ocat = $list['ocat'];
$domicile = $list['domicile'];
$dob = $list['dob'];
$alotrank = $list['alotrank'];
$gmr = $list['gmr'];
$doa = $list['doa'];
$mob = $list['mob'];
$gmob = $list['gmob'];
$address = $list['address'];
$aadhar = $list['aadhar'];
$mail = $list['mail'];
$fsbi = $list['fsbi'];
$fcbi = $list['fcbi'];
?>
<?php

echo '
<!doctype html>
<html lang="en">

<head>
    <title>Reciept : ' . $roll .'</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card">
            <div class="mx-4">
                <div class="container">
                    <p class="my-5 mx-5 text-center" style="font-size: 30px;">Ramkrishna Mahato Government Engineering College</p>
                    <div class="row">
                        <ul class="list-unstyled">
                            <li class="text-black">Name: '.$name .'  ('. $gender.')</li>
                            <li class="mt-3"><span class="text-black">Department: </span>'.$dept.'</li>
                            <li class="text-black my-3">Email: '.$mail.'</li>
                            <div >
                            <p>Original Category: '.$ocat.'</p>
                            <p>Alloted Category: '.$acat.'</p>
                            </div>  ' ; ?>
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <p>Address: <?php echo $address ?></p>
                        </div>
                        <div class="text-right" style="margin-top: 90px;">
                        <p class="text-info">Date of Admission: <?php echo $doa ?></p>
                        <p> Date of birth: <?php echo $dob ?>, Domicile: <?php echo $domicile ?></p>
                    </div>
                        <hr>
                    </div>
                     <ul class="list-unstyled">
                            <li class="text-black">Phone: <?php echo $mob ?></li>
                            <li class="mt-3"><span class="text-black">Guardian Phone: </span><?php echo $gmob ?></li>
                            <li class="text-black mt-3">General Merit Rank: <?php echo $gmr ?></li>
                            <li class="text-black mt-3">Alloted Rank: <?php echo $alotrank ?></li>
                        </ul>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Fees(SBI)</p>
                        </div>
                        <div class="col-xl-2">
                            <p class="float-end"><?php echo "₹".$fsbi ?>
                            </p>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Fees(CBI)</p>
                        </div>
                        <div class="col-xl-2">
                            <p class="float-end"><?php echo "₹".$fcbi ?>
                            </p>
                        </div>
                        <hr style="border: 2px solid black;">
                    </div>
                    <div class="row text-black">

                        <div class="col-xl-12">
                            <p class="float-end fw-bold">Total: <?php echo "₹".$fcbi+$fsbi ?>
                            </p>
                        </div>
                        <hr style="border: 2px solid black;">
                    </div>
                   

                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>