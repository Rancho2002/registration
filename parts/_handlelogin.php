<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include "_dbconnect.php";
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $sql="SELECT * FROM `users` where `username`='$user'";

    $result1=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result1)==1){
        if($pass==""){
            header("location: /registration/teacher.php/?pass=wrong");
            exit;
        }

        $row=mysqli_fetch_assoc($result1);
        if($pass==password_verify($pass,$row['password'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$user;     
            header("location: /registration/teacher.php/?user=".$user);     
        }
        else{
            header("location: /registration/teacher.php/?pass=wrong");  
        }
    }
    else{
        header("location: /registration/teacher.php/?exist=false");
    }
}

?>