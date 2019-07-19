<?php
    session_start();
    include '../connect.php';

    $foto = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $region = $_POST["region"];
    $kecamatan = $_POST["kecamatan"];
    $village = $_POST["village"];
    $address = $_POST["address"];    
    $birth = $_POST["birth"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$foto;
    // Set path folder tempat menyimpan fotonya
    $path = "../uploaduser/".$fotobaru;
    $path2 = "uploaduser/".$fotobaru;
    // echo $fotobaru;
    // echo $path;
    // echo $foto;
    if(move_uploaded_file($tmp, $path)){
        $ins = "INSERT INTO user (full_name, username, email, village, region, kecamatan, path, address, birthday, phone, gender, password, repassword) VALUE ('$full_name','$username','$email','$village','$region', '$kecamatan', '$path2', '$address', '$birth','$phone','$gender','$password','$repassword')";
        if ($conn->query($ins) === TRUE) {
            $_SESSION['login_user'] = $username;
            $_SESSION['login_pass'] = $password;
            header("location:../user/");
        } else {
            echo("Periksa Koneksi Anda !");
            echo $path2;
        }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
    }
?>