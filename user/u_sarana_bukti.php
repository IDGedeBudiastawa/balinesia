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
                <form method="POST" action="up_sar.php" enctype="multipart/form-data">
                    <input type="hidden" id="order_id" class="form-control" name="order_id" value="<?php echo $data_id; ?>" required autocomplete="off">                    
                    <div id="preview-image">
                        <!-- <img id="uploadPreview" style="width: 150px; height: 150px;"/><br> -->
                    </div>

                    <div id="fileUpload" class="form-group" style="margin-left: 0px;">Pilih Gambar Bukti Transfer
                        <input class="form-control" type="file" name="gambar" onchange="PreviewImage();" id="gambar" required autocomplete='off'/>
                    </div>
                    <div id="pilihan" style="margin-top: 40px; display: flex;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="width: 150px;" class="btn btn-info">Upload Bukti Transfer</button>
                        </div>
                        <div id="aref" style="flex: 2;">
                            <p>Dengan menekan tombol <b>Upload </b> maka anda telah melakukan pembayaran</p>
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

<script type="text/javascript">

    // $("#gambar1").on('change', function () {
    function PreviewImage() {
        // alert('Nama');
        console.log('tesimage');
     //Get count of selected files
         var countFiles = $("#gambar")[0].files.length;
        console.log('tesimage');
         var imgPath = $("#gambar")[0].value;
         var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
         var image_holder = $("#preview-image");
         console.log('tesimage');
         image_holder.empty();
        //console.log('tesimage');
         if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
             if (typeof (FileReader) != "undefined") {
     
                 //loop for each file selected for uploaded.
                 for (var i = 0; i < countFiles; i++) {
     
                     var reader = new FileReader();
                     reader.onload = function (e) {
                         $("<img />", {
                             "src": e.target.result,
                                 "class": "gbr"
                         }).appendTo(image_holder);
                     }
     
                     image_holder.show();
                     reader.readAsDataURL($("#gambar")[0].files[i]);
                 }
     
             } else {
                 alert("This browser does not support FileReader.");
             }
         } else {
             alert("Pls select only images");
         }
     }
     
</script>