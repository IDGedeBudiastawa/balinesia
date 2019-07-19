<?php
    session_start();
    include ('../connect.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        
        $login = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($conn,$login);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id = $row['user_id'];
        //$active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
            
        if($count == 1) {
            //session_register("myusername");
            $_SESSION['login_user'] = $myusername;
            $_SESSION['login_pass'] = $mypassword;
            $_SESSION['user_id'] = $id;
            header("location: ../user/");
            // echo "1";
        }else {
            //$error = "Your Login Name or Password is invalid";
            echo("Your Username or Password is invalid");
        }
    }


?>