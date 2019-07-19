<?php
    include 'connect.php';

    $full_name = $_GET["full_name"];
    $username = $_GET["username"];
    $email = $_GET["email"];
    $region = $_GET["region"];
    $village = $_GET["village"];
    $address = $_GET["address"];    
    $birth = $_GET["birth"];
    $phone = $_GET["phone"];
    $gender = $_GET["gender"];
    $password = $_GET["password"];
    $repassword = $_GET["repassword"];

    $ins = "INSERT INTO user (full_name, username, email, village, region, address, birthday, phone, gender, password, repassword) VALUE ('$full_name','$username','$email','$village','$region', '$address', '$birth','$phone','$gender','$password','$repassword')";
    if ($conn->query($ins) === TRUE) {
        header("location:../html/user.html");
    } else {
        echo("Periksa Koneksi Anda !");
    }
?>