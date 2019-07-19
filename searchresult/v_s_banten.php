<?php
    include '../connect.php';
    $id = $_GET['data_id'];
    $queban = "SELECT fot_sar.url_sarana, sarana.sarana_id, sarana.sarkat_id, user.user_id, user.phone, user.address, sarana.sar_nama, sarana.des_sar, sarana.dibuat, sarana.stock_sar, sarana.sar_price, sarana.pilihan, sar_kategori.sarkat_nama, user.username FROM sarana, sar_kategori, fot_sar, user WHERE sarana.sarkat_id = sar_kategori.sarkat_id AND sarana.user_id = user.user_id AND sarana.sarana_id = fot_sar.sarana_id AND sarana.sarana_id = '$id'";
    $resba = $conn->query($queban);
    $rowba = $resba -> fetch_assoc();
?>

<html>
<head>
    <title>Beli banten</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
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
        <div id="header" style="margin-top: -20px;">
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
            <div id="isi1" style="width: 90%; margin-left: 5%;">
                <h1 style="text-align: center; color: #487eb0;">Data Pembelian Banten</h1><br><br>
                <div class="banten" style="display: flex;">
                    <div class="gam" style="flex: 2;">
                        <img style="width: 500px; height: 500px;" src="../banten/<?php echo $rowba['url_sarana'] ?>">
                        
                    </div>
                    <div class="form" style="flex: 2">
                        <h3><i><b>Nama Banten : <?php echo $rowba['sar_nama']; ?> </b></i></h3>
                        <h3>Stock Sisa : <?php echo $rowba['stock_sar'] ?></h3>
                        <div style="height: 2px; width: 400px; background-color: #487eb0;">
                        </div>
                        <h4>Penjual : <?php echo $rowba['username'] ?></h4>
                        <p><i>Kontak : <?php echo $rowba['phone'] ?></i></p>
                        <p>Alamat Penjual : <?php echo $rowba['address'] ?></p>
                        <div style="background-color: #70a1ff; border-radius: 3px;">
                            <p><?php echo $rowba['des_sar'] ?></p>
                        </div><br>
                        <form action="../login/">
                            <div class="form-group">
                                <input type="disable" id="jumlah" class="form-control" name="jumlah" placeholder="Jumlah Pesanan" min="1" max="<?php echo $rowba['stock_sar'] ?>">
                            </div>
                            <div id="pilihan" style="display: flex;">
                                <div id="tombol" style="flex: 2;">
                                    <button type="submit" style="width: 150px;" class="btn btn-info" id="tombol">Login Untuk Membeli</button>
                                </div>
                                <div id="aref" style="flex: 2;">
                                    <p>Dengan menekan <b>BELI </b>maka anda setuju dengan syarat dan ketentuan</p>
                                </div>
                            </div>
                            
                        </form>
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
<script type="text/javascript" src="../jquery-1.7.1.min.js" ></script>
</html>


<script type="text/javascript">
    function validasi_input(form){

        pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
        if(!pola_username.test(form.username.value)){
            alert ('Periksa username anda kembali !');
            form.username.focus();
            return false;
        }

        var max = 30;
        if (form.password.value.length > max){
            alert("Periksa password anda kembali");
            form.password.focus();
            return (false);
        }
    }



    // var username = $("#username").val();
    // var password = $("#password").val();
    
    // $("#tombol").click(function() {  
    //     console.log(username + password);
    //         $.ajax({
    //             type: "POST",
    //             url: "login.php",
    //             data: "username = "+username+"&password = "+password,
    //             success: function(msg){
    //                 if(msg == '1') {
    //                     alert( "berhasil "+username);
    //                 }
    //                 else {
    //                     alert("gagal");
    //                 }
    //         }
            
    //     });
    // });
    
</script>