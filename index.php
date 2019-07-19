<?php 
    include("connect.php");
    session_start();
    if(isset($_SESSION['login_user'])){
        $user_check = $_SESSION['login_user'];
        $user_pass = $_SESSION['login_pass'];
        $id_user = $_SESSION['user_id'];
        $ses_sql = mysqli_query($conn,"SELECT * FROM user WHERE username = '$user_check' and password = '$user_pass'");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        $login_session = $row['username'];
        $login_id = $row['user_id'];
        header("location: user/");
    }
?>

<html>
<head>
    <title>Balinesia</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="asets/css/bootstrap.min.css">
    <script src="asets/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        html,body{
            margin: 0;
            padding: 0; 
            height: 100%;
        }
        #wrapper{
            min-height: 100%;
            position: relative;
        }
        #body{
            padding-bottom: 300px;
        }
        .footer{
            position: absolute; 
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 0;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
                <div id="logo">
                    <img style="margin-top: -10px; margin-left : 10px; width: 140px"; height="90px;" src="img/logo.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <a href="login/" id="tomlog">Login</a>
                    <a href="register/" id="tomreg">Register</a>
                </div>
        </div>
        <div id="body">
            <div class="gambar">
                <img style="width: 100%; height: 670px;" src="img/balinesia.jpg">
                <!-- <p id="teks" style="color: black; text-align: center; position: relative">Kalau bisa lebih mudah kenapa tidak</p> -->
            </div>

            <div class="search">
                <form method="post" action="searchresult/">
                    <p style="text-align: right; margin-top: -30px"><i>Solusi upacara anda</i></p>
                    <input id="keywords" style="height: 38px; width: 300px; border-width: 0px; border-radius: 4px; margin-top: 20px" type="text" name="keywords" placeholder="      Banten, upacara" required autocomplete="off">
                    <button style="height: 36px;" type="submit" class="btn btn-info">Click to search</button>
                </form>
            </div>

            <div class="isi">
                <div id="view" style="width: 100%;">
                    <div id="v_upacara">
                        <div class="pembatas" style="width: 100%; height: 50px; background-color: #0c2461; border-radius: 7px">
                            <h1 style="text-align: center; color: white;">KENAPA KAMI ? </h1>
                        </div><br>
                        <div style="display: flex;">
                            <div style="flex: 2">
                                <img src="/img/pelayanan.png" style="width: 450px; height: 300px;">
                                <h3 style="margin-left: 120px"><b>Pelayanan Optimal</b></h3>
                            </div>
                            <div style="flex: 2">
                                <img src="/img/transaksi.png" style="width: 250px; height: 250px; margin-left: 100px; margin-top: 30px;">
                                <h3 style="margin-left: 125px"><b>Transaksi Mudah</b></h3>
                            </div>
                            <div style="flex: 2">
                                <img src="/img/hemat.png" style="width: 270px; height: 270px; margin-left: 70px; margin-top: 10px">
                                <h3 style="margin-left: 130px"><b>Biaya Hemat</b></h3>
                            </div>
                        </div>

                    </div><br><br>

                    <div id="v_banten">
                        <div class="pembatas" style="width: 100%; height: 50px; background-color: #0c2461; border-radius: 7px">
                            <h1 style="text-align: center; color: white;">SERVICE KAMI</h1>
                        </div><br>
                    </div><br><br>

                    <div id="v_kategori">
                        <div class="pembatas" style="width: 100%; height: 50px; background-color: #0c2461; border-radius: 7px">
                            <h1 style="text-align: center; color: white;">KEUNGGULAN KAMI ? </h1>
                        </div><br>
                    </div>

                    

                </div>
            </div>
        </div>
        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 60%; margin-top: 40px; width: 160px; float: left;"; height="140px;" src="img/logo.png">
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
                <p style="padding-top: 8px; color: #57606f;">Copyright &copy; 2018 - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
</html>