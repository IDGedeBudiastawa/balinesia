<?php 
    include("../connect.php");
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
    
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
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

    </style>
</head>

<body>

        <div id="header" style="margin-top: -20px">
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
                <h1 style="text-align: center; color: #487eb0;">REGISTER</h1><br>
                <form method="POST" action="signup.php" onsubmit="return validasi_input(this)" enctype="multipart/form-data">
                    <div class="flex" style="display: flex;">
                        <div class="1" style="flex: 2"></div>
                        <div id="viewImage" style="flex: 2;">
                            <img src="../img/usermale.png" id="uploadPreview" style="width: 150px; height: 150px; margin-left: 22px;"/><br>
                        </div>
                        <div class="1" style="flex: 2"></div>
                    </div>

                    <div class="flex" style="display: flex;">
                        <div class="1" style="flex: 4"></div>
                        <div class="1" style="flex: 4"></div>
                        <div class="fileUpload btn btn-primary" style="margin-left: 0px; flex: 2; height: 35px;">
                            <span class="glyphicon glyphicon-camera"> Pilih</span>
                            <input class='upload' type='file' name='file' id='file' required autocomplete='off' onchange="PreviewImage();" multiple/>
                        </div>
                        <div class="1" style="flex: 4"></div>
                        <div class="1" style="flex: 4"></div>
                    </div><br>

                    <div class="form-group">
                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Nama sesuai KTP " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <?php
                            $querykab = mysqli_query($conn, 'SELECT * FROM kabupaten');
                        ?>
                        <select class="form-control" name="region" id="region" required autocomplete="off">
                            <option value="pilih" selected>--- Pilih Kabupaten ---</option>
                            <?php
                                while($rowkab = mysqli_fetch_array($querykab)){
                            ?>
                            <option value="<?php echo $rowkab['kab_id'] ?>"> <?php echo $rowkab['kab_nama'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kecamatan" id="kecamatan" required autocomplete="off">
                            <option value="pilih" selected>--- Pilih Kecamatan ---</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="village" id="village" required autocomplete="off">
                            <option value="pilih" selected>--- Pilih Kelurahan ---</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="address" id="address" class="form-control" placeholder="Specific Address " required autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" name="birth" id="birth" class="form-control" placeholder="Birth Day " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Active Phone Number " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="gender" id="gender" required autocomplete="off">
                            <option value="pilih" selected>--- Pilih Salah Satu ---</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="repassword" id="repassword"  class="form-control"placeholder="Re-Type Password " required autocomplete="off">
                    </div>

                    <div id="pilihan" style="display: flex;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="width: 150px;" class="btn btn-info">SIGN UP</button>
                        </div>
                        <div id="aref" style="flex: 2;">
                            <p>Sudah punya akun BALINESIA ? Silahkan <b><a href="../login/" style="text-decoration: none; color: #487eb0;">LOGIN</a></b> disini </p>
                        </div>
                    </div>

                </form>
            </div>            
        </div>

        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 60%; margin-top: 40px; width: 160px; float: left;"; height="140px;" src="../img/logo.png">
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

</body>
<script type="text/javascript" src="../asets/jquery-3.2.1.min.js" ></script>
</html>

<script>
    //alert('tes');
    $(document).ready(function(){
        $('#region').change(function(){
            //$('#modal-loading').modal('show');
            var kab_id = $("#region").val();
            //alert(kab_id);
            $.ajax({
                type: 'POST',
                url: 'kecamatan.php',
                data: 'kab_id=' +kab_id,
                success: function(response){
                    $('#kecamatan').html(response);
                    //$('#modal-loading').modal('hide');
                }
            });
            //console.log(kab_id);
        })
    });

    $(document).ready(function(){
        $('#kecamatan').change(function(){
            //$('#modal-loading').modal('show');
            var kec_id = $("#kecamatan").val();
            //alert(kab_id);
            $.ajax({
                type: 'POST',
                url: 'kelurahan.php',
                data: 'kec_id=' +kec_id,
                success: function(response){
                    $('#village').html(response);
                    //$('#modal-loading').modal('hide');
                }
            });
            //console.log(kab_id);
        })
    });
</script>

<script type="text/javascript">
    function validasi_input(form){

        pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
        if(!pola_username.test(form.username.value)){
            alert ('Username minimal 6 karakter dan hanya boleh Huruf atau Angka!');
            form.username.focus();
            return false;
        }

        if (form.phone.value != ""){
        var x = (form.phone.value);
            if(x.length > 14){
                alert("Periksa kembali no telepon anda");
                form.phone.focus();
                return false;
            }
            else{
                var status = true;
                var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                for (i=0; i<=x.length-1; i++)
                {
                    if (x[i] in list) cek = true;
                    else cek = false;
                status = status && cek;
                }
                if (status == false)
                {
                    alert("Telp harus angka!");
                    form.phone.focus();
                    return false;
                }
            }
        }

        if (form.region.value =="pilih"){
            alert("Kabupaten belum diisi ! ");
            return (false);
        }

        if (form.kecamatan.value =="pilih"){
            alert("Kecamatan belum diisi ! ");
            return (false);
        }

        if (form.village.value =="pilih"){
            alert("Kelurahan belum diisi ! ");
            return (false);
        }

        if (form.gender.value =="pilih"){
            alert("Jenis kelamin belum diisi ! ");
            return (false);
        }

        if(form.password.value != form.repassword.value){
            alert("Password dan Re-Password tidak sesuai ! ");
            form.password.focus();
            return false;

        }

        var max = 30;
        if (form.password.value.length > max){
            alert("Panjang Password Maksimal 12 Karater!");
            form.password.focus();
            return (false);
        }
    }

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        oFReader.onload = function (oFREvent)
         {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>