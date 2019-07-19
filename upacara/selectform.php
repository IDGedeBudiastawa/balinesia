<?php 
    include("../connect.php");
    $isiform = array();
    for($i=0;$i<9;$i++) {
        if(isset($_POST['check_'.$i])===TRUE) {
            array_push($isiform,1);
        }
        else {
            array_push($isiform,0);
        }
    }
    $data_id = $_GET["data_id"];
?>

<html>
<head>
    <title>Tambah Market</title>
    <link rel="stylesheet" type="text/css" href="../css/input.css">
    <script type="text/javascript" src="../jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="../jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
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
                    <a href="#" id="tomreg">Home</a>
                </div>
        </div>
        <div id="body">
            <div id="isi">
                <h1 style="text-align: center; color: #487eb0;">ISI FORM ANDA</h1>
                <form method="POST" action="input.php">
                    <div class="form-group">
                        <input type="hidden"  name="data_id" value="<?php echo $data_id; ?>">
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_0">
                        Nama Lengkap
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_1">
                        Nama Panggilan
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_2">
                        Alamat
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_3">
                        No Telepon
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_4">
                        Tanggal Lahir
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_5">
                        Usia
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_6">
                        Jenis Kelamin
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_7">
                        No KTP
                    </div>
                    <div class="form-group">
                        <input type="checkbox"  name="check_8">
                        Email
                    </div>
                    <div id="pilihan" style="margin-top: 40px; display: flex;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="width: 150px;" class="btn btn-info">Tambahkan</button>
                        </div>
                        <div id="aref" style="flex: 2;">
                            <p>Dengan menekan tombol <b>Tambahkan </b>maka event anda akan disimpan dan dipublikasikan </p>
                        </div>
                    </div>
                </form>
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