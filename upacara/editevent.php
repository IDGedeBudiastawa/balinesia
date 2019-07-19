<?php
    include '../connect.php';
    $data_id = $_GET['data_id'];
    $sql = mysqli_query($conn, "SELECT * FROM event WHERE event_id='$data_id'");
    $row = mysqli_fetch_array($sql);
    $evid = $row['evkat_id'];

    $getkat = "SELECT * FROM ev_kategori WHERE evkat_id = '$evid'";
    $resultkat = $conn->query($getkat);
    $row2 = $resultkat->fetch_assoc();
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
        .gbr {
            width: 100px;
            height: 150px;
            margin-left: 20px;
            margin-top: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header" style="margin-top: -20px;">
                <div id="logo">
                    <img style="margin-top: -10px; margin-left : 10px; width: 90px"; height="90px;" src="../img/logo1.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <a href="../" id="tomreg">Home</a>
                </div>
        </div>
        <div id="body">
            <div id="isi">
                <h1 style="text-align: center; color: #487eb0;">Tambah Event</h1><br>
                <form method="POST" action="updateevent.php">
                    <input type="hidden" value="<?php echo $row['event_id'];?>" name="event_id">
                    <div class="form-group">
                        <?php
                            $querykat = mysqli_query($conn, 'SELECT * FROM ev_kategori');
                        ?>
                        <select class="form-control" name="kategori" id="kategori" required autocomplete="off">
                            <option value="<?php echo $evid; ?>" selected><?php echo $row2['evkat_nama'];?></option>
                            <?php
                                while($rowkat= mysqli_fetch_array($querykat)){
                            ?>
                            <option value="<?php echo $rowkat['evkat_id'] ?>"> <?php echo $rowkat['evkat_nama'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
<!--                     <div class="form-group">
                        <input type="text" id="kategori" class="form-control" name="kategori" value="<?php echo $row['evkat_id'];?>" required autocomplete="off">
                    </div> -->
                    <div class="form-group">
                        <input type="text" id="navent" class="form-control" name="navent" value="<?php echo $row['event_nama'];?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="date" id="date" class="form-control" name="date" value="<?php echo $row['ev_date'];?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea type="text" id="desvent" class="form-control" name="desvent" required autocomplete="off"><?php echo $row['des_event'];?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="price" class="form-control" name="price" value="<?php echo $row['price_ev'];?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" id="slotmember" class="form-control" name="slotmember" value="<?php echo $row['slot_member'];?>" required autocomplete="off">
                        <p style="color: #57606f; font-size: 12px;">*) Jumlah akan berkurang setiap pendaftar tervalidasi</p>
                    </div>
                    <div class="form-group">
                        <input type="text" id="place" class="form-control" name="place" value="<?php echo $row['ev_place'];?>" required autocomplete="off">
                        <p style="color: #57606f; font-size: 12px;">*) Masukan alamat sedetail mungkin </p>
                    </div>
                    <p><b>Tambahkan Gambar</b></p>
                    <p style="font-size: 12px; color: #57606f; margin-top: -17px;">*) Wajib upload minimal 1 gambar</p>
                    <div class="preview_image">
                        <?php
                            $fotque = "SELECT * FROM fot_event WHERE event_id = '$data_id'";
                            $resfot = $conn->query($fotque);
                            $total = mysqli_num_rows($resfot);
                            if ($total > 0) {
                              while ($rowfot = $resfot -> fetch_assoc()) {
                                echo "<img class='card-img-top' src='".$rowfot['url_event']."' alt='Card image cap' style='width: 100px; height: 150px; margin-left: 10px;'>";

                              }
                            }else{
                              echo "Belum Ada Banten";
                          }
                        ?>
                    </div><br>

                    <div id="fileUpload" class="btn btn-primary" style="margin-left: 0px;">Pilih Gambar
                        <input class="upload" type="file" name="gambar[]" onchange="PreviewImage();" id="gambar" required autocomplete='off' multiple/>
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
                    <img style="margin-left: 80%; margin-top: 30px; width: 100px; float: left;"; height="100px;" src="../img/logo1.png">
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