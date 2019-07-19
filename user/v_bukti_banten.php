<?php 
    include("../connect.php");

    session_start();
    $myusername = $_SESSION['login_user'];
    $user_pass = $_SESSION['login_pass'];
    $get_user = "SELECT * FROM user WHERE username = '$myusername'";
    $result = $conn->query($get_user);
    $row = $result->fetch_assoc();
    $id = $row['user_id'];

    $data_id = $_GET['data_id'];

    $get_peserta = "SELECT * FROM order_product WHERE order_id = '$data_id'";
    $result2 = $conn->query($get_peserta);
    $row2 = $result2->fetch_assoc();

?>

<html>
<head>
    <title>Tambah Upacara</title>
    <link rel="stylesheet" type="text/css" href="../css/input.css">
    <script type="text/javascript" src="../jquery-ui.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="../jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../asets/jquery-3.2.1.min.js" ></script>
    <style>
        html,body{
            margin:0;padding:0;height:100%;
        }
        #wrapper{
            min-height:100%;position:relative;
        }
        #body{
            padding-bottom:100px;
        }
        .footer{
            position: relative;
            margin-top: 200px; 
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 0;
        }
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 10px;
        }
        
        .gbr {
            width: 400px;
            height: 500px;
            margin-left: 20px;
            margin-top: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
                <div id="logo">
                    <img style="margin-top: -10px; margin-left : 10px; width: 140px"; height="90px;" src="../img/logo.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <a href="../" id="tomreg">Home</a>
                </div>
        </div>
        <div id="body">
            <div id="isi">
                <br><h1 style="text-align: center; color: #487eb0;">Bukti Pembayaran Banten</h1><br><br>
                
                    <input type="hidden" id="order_id" class="form-control" name="order_id" value="<?php echo $row2['peserta_path']; ?>" required autocomplete="off">                    
                    <div id="preview-image">
                        <img src="<?php echo $row2['order_path'] ?>">
                        <!-- <img id="uploadPreview" style="width: 150px; height: 150px;"/><br> -->
                    </div>

                    <div id="pilihan" style="margin-top: 40px; display: flex;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="" class="btn btn-info"><a href="banten_valid.php" style="text-decoration: none; color: white;">Kembali Untuk Melakukan Validasi</a></button>
                        </div>
                        <div id="aref" style="flex: 2;">
                            <p>Pastikan bukti pembayaran sudah sesuai dan asli</p>
                        </div>
                    </div>

                
            </div>            
        </div>

        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 80%; margin-top: 30px; width: 160px; float: left;"; height="140px;" src="../img/logo.png">
                </div>
                <div id="fotnu">
                    <p style="text-align: left;"><a href="">Privacy Policy</a></p>
                    <p style="text-align: left;"><a href="">Terms and Conditions</a></p>
                    <p style="text-align: left;"><a href="">Cooperation</a></p>
                </div>
                <div id="fotnu2">
                    <p style="text-align: left;"><a href="">Balinesia Guide</a></p>
                    <p style="text-align: left;"><a href="">News</a></p>
                    <p style="text-align: left;"><a href="">Tips Join</a></p>
                </div>
                <div id="sosmed">
                    <p>Find us at</p>
                </div>
            </div>
            <div id="foot">
                <p style="color: #57606f;">Copyright &copy; 2018 - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
</html>