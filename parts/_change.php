<?php

if($_SERVER['REQUEST_METHOD']=='POST'){ 
    include "_dbconnect.php";
    $user=$_POST['user'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpass'];
    $opass=$_POST['opass'];

    $chksql="SELECT * FROM `users` where `username`='$user'";
    $result1=mysqli_query($conn,$chksql);
    $row=mysqli_fetch_assoc($result1);

    if(password_verify($opass,$row['password'])){
    // if($opass==$row['password']){
        if($pass==$cpass){
            $hash=password_hash($pass, PASSWORD_DEFAULT);
            // echo $hash.'<br>';
            // echo $user.'<br>'.$pass.'<br>'.$cpass;
            $sql="UPDATE `users` SET `password` = '$hash' WHERE `users`.`username` = '$user'";
            $result=mysqli_query($conn,$sql);
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$user;
            header("location: /registration/teacher.php/?pass=changed");
        }
        else{
            header("location: /registration/change.php/?pass=notsame&user=".$user);
        }
    }
    else{
        header("location: /registration/change.php/?pass=wrong&user=".$user);
    }
}