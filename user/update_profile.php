<?php
    session_start();
    include '../connect.php';

    $uid = $_POST['uid'];
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
    $pathold = $_POST['gambar'];
    $ext = $_FILES['file']['type'];
    $tmpsize = $_FILES['file']['size'];
    
    echo $foto;
    if($foto == ""){
        $path = $pathold;
        $ins = "UPDATE user SET full_name = '$full_name', username = '$username', email = '$email', village = '$village', region = '$region', kecamatan = '$kecamatan', path = '$path', address = '$address', birthday = '$birth', phone = '$phone', gender = '$gender' WHERE user_id = '$uid'";
        if ($conn->query($ins) === TRUE) {
            $_SESSION['login_user'] = $username;
            $_SESSION['login_pass'] = $password;
            header("location:../user/profile.php");
        }else{
            echo("Periksa Koneksi Anda !");
            //echo $path2;
        }
    }else{
        if($ext != 'jpg/png'){
            if($tmpsize <= 5000000){
                $fotobaru = date('dmYHis').$foto;
                $path = "../uploaduser/".$fotobaru;
                $path2 = "uploaduser/".$fotobaru;
                move_uploaded_file($tmp, $path);
                // echo $path2;
                $ins = "UPDATE user SET full_name = '$full_name', username = '$username', email = '$email', address = '$address', village = '$village', region = '$region', kecamatan = '$kecamatan', path = '$path2', birthday = '$birth', phone = '$phone', gender = '$gender' WHERE user_id = '$uid'";
                    if ($conn->query($ins) === TRUE) {
                        $_SESSION['login_user'] = $username;
                        $_SESSION['login_pass'] = $password;
                        header("location:../user/profile.php");
                    }else{
                        echo("Periksa Koneksi Anda !");
                        //echo $path2;
                    }
            }else{
                echo "Ukuran foto terlalu besar, maksimal ukuran foto adalah 5MB !";
            }
        }else{
            echo "Format foto tidak sesuai !";
        }
        
    }

?>