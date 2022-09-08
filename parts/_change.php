<?php

if($_SERVER['REQUEST_METHOD']=='POST'){ 
    include "_dbconnect.php";
    $user=$_POST['user'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpass'];
    if($pass==$cpass){
        $hash=password_hash($pass, PASSWORD_DEFAULT);
        // echo $hash.'<br>';
        // echo $user.'<br>'.$pass.'<br>'.$cpass;
        $sql="UPDATE `users` SET `password` = '$hash' WHERE `users`.`username` = '$user'";
        $result=mysqli_query($conn,$sql);
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$user;
        header("location: /registration/");
    }
    else{
        header("location: /registration/change.php/?pass=notsame");
    }
}