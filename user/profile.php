<?php 
    include("../connect.php");
    session_start();
    $myusername = $_SESSION['login_user'];
    $user_pass = $_SESSION['login_pass'];
    $get_user = "SELECT * FROM user WHERE username = '$myusername'";
    $result = $conn->query($get_user);
    $row = $result->fetch_assoc();
    $id = $row['user_id'];
    $region = $row['region'];
    $kecamatan = $row['kecamatan'];
    $kelurahan = $row['village'];

    $getkab = "SELECT * FROM kabupaten WHERE kab_id = $region";
    $resultkab = $conn->query($getkab);
    $row2 = $resultkab->fetch_assoc();
    $kabnama = $row2['kab_nama'];

    $getkec = "SELECT * FROM kecamatan WHERE kec_id = $kecamatan";
    $resultkec = $conn->query($getkec);
    $row3 = $resultkec->fetch_assoc();
    $kecnama = $row3['kec_nama'];

    $getkel = "SELECT * FROM kelurahan WHERE kel_id = $kelurahan";
    $resultkel = $conn->query($getkel);
    $row4 = $resultkel->fetch_assoc();
    $kelnama = $row4['kel_nama'];
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $myusername ?> Profile</title>

  <script type="text/javascript" src="../asets/jquery-1.7.1.min.js"></script>
  <link rel="stylesheet" href="../adminlte2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../adminlte2/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../adminlte2/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../adminlte2/adminlte2/dist/css/skins/_all-skins.min.css">
  <style>
      /*.sidenu ul li{
          margin-top: 20px;
      }*/
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="background-color: #487eb0; position: fixed; width: 100%;">
    <!-- Logo -->
    <a href="../" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <b>BL</b>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img style="margin-top: -24px; width: 140px"; height="90px;" src="../img/logo.png">
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img <?php echo "src=../".$row['path']."" ?> class="user-image" alt="User Image">
              <span class="hidden-xs" style="color: black"><i><?php echo $myusername ?></i></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img <?php echo "src=../".$row['path']."" ?> class="img-circle" alt="User Image">
              </li>
              <li class="user-header" style="margin-top:-80px">
                <h3>Rating </h3>
              </li>
              <li class="user-body" style="margin-top: -40px">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Upacara </a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="status_pendaftar.php">Status Daftar</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="keranjang.php">Keranjang </a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../login/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar" style="background-color: rgb(223, 228, 234); position : fixed">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img <?php echo "src=../".$row['path']."" ?> class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $myusername ?></p> <!-- nama pengguna  -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="../search/search.php" method="GET" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="key" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button style="height:34px;" type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <div class="sidenu">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">SELAMAT DATANG</li>
        <li style="margin-top: 20px;" class="active treeview">
          <a href="#" class="dashboard">
            <i class="glyphicon glyphicon-book"></i><span>Laman Utama</span>
          </a>
        </li>
        <li style="margin-top: 20px;">
          <a href="index.php" class="dashboard">
            <i class="glyphicon glyphicon-th"></i><span>Semua Banten</span>
          </a>
        </li>
        <li style="margin-top: 20px;">
          <a href="allup.php" class="dashboard">
            <i class="glyphicon glyphicon-th"></i><span>Semua Upacara</span>
          </a>
        </li>
        <li style="margin-top: 20px;" class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-gift"></i>
            <span>Upacara</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="tersedia" style="margin-top: 10px;"><a href="v_upacara.php"><i class="glyphicon glyphicon-tags"></i> Upacara Tersedia</a></li>
            <li class="peserta" style="margin-top: 10px;"><a href="v_peserta.php"><i class="glyphicon glyphicon-list-alt"></i> Peserta Upacara</a></li>
            <li class="tambahup" style="margin-top: 10px;"><a href="../upacara/"><i class="glyphicon glyphicon-plus"></i> Tambah Upacara</a></li>
          </ul>
        </li>
        <li style="margin-top: 20px;" class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-wrench"></i>
            <span>Alat Upacara</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="alatup" style="margin-top: 10px;"><a href="v_banten.php"><i class="glyphicon glyphicon-folder-open"></i> Alat Upacara Tersedia</a></li>
            <li class="tambahal" style="margin-top: 10px;"><a href="../banten/"><i class="glyphicon glyphicon-plus"></i> Tambah Alat Upacara</a></li>
          </ul>
        </li>
        <li style="margin-top: 20px;" class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-retweet"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="booking" style="margin-top: 10px;"><a href="banten_valid.php"><i class="glyphicon glyphicon-check"></i> Validasi Pembeli</a></li>
            <li class="validasi" style="margin-top: 10px;"><a href="peserta_valid.php"><i class="glyphicon glyphicon-ok-sign"></i> Validasi Peserta</a></li>
          </ul>
        </li>



        <li style="margin-top: 20px;" class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-bell"></i> <span>Pemberitahuan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="booking" style="margin-top: 10px;" onclick="Loadinbox()"><a href="#"><i class="glyphicon glyphicon-save"></i> Kontak Masuk</a></li>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
            </span>
            <li class="validasi" style="margin-top: 10px;" onclick="Loadsent()"><a href="#"><i class="glyphicon glyphicon-open"></i> Terkirim</a></li>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">16</small>
            </span>
          </ul>
        </li>
      </ul>
    </div>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: white">
      <div style="margin-left: 15%; margin-right: 5%; height: 100%;" class="isi">
        <div style="margin-top:100px; position: absolute; width: 100%" class="tampil">
          <div class="profil" style="width: 60%">
          <h1 style="text-align: center; color: #487eb0;">PROFIL ANDA</h1><br>
                <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                  <input type="hidden" name="uid" id="uid" value="<?php echo $id ?>" class="form-control">

                  <div class="imagepro" style="display: flex;">
                    <div class="1" style="flex: 4"></div>
                    <div class="1" style="flex: 4"></div>
                    <div class="image" style="flex: 4">
                      <img style="width: 200px; height: 200px" id="uploadPreview" <?php echo "src=../".$row['path']. "" ?> id="image">
                    </div>
                    <div class="1" style="flex: 4"></div>
                    <div class="1" style="flex: 4"></div>
                  </div><br>

                  <div class="flex" style="display: flex;">
                      <div class="1" style="flex: 4"></div>
                      <div class="1" style="flex: 4"></div>
                      <div class="fileUpload btn btn-primary" style="margin-left: 0px; flex: 2; width: 35px;">
                          <span class="glyphicon glyphicon-camera" style=""> Ganti</span>
                          <input class='upload' type='file' name='file' id='file' required autocomplete='off' onchange="PreviewImage();" multiple/>
                          <input type="hidden" name="gambar" id="gambar" value="<?php echo $row['path'] ?>" class="form-control" placeholder="Foto">
                      </div>
                      <div class="1" style="flex: 4"></div>
                      <div class="1" style="flex: 4"></div>
                  </div><br>

                    <div class="form-group">
                        <input type="text" name="full_name" id="full_name" class="form-control" value="<?php echo $row['full_name'] ?>" placeholder="Nama sesuai KTP " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username'] ?>" placeholder="Username " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="E-mail " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <?php
                            $querykab = mysqli_query($conn, 'SELECT * FROM kabupaten');
                        ?>
                        <select class="form-control" value="value="<?php echo $kabnama; ?>" name="region" id="region" required autocomplete="off">
                            <option value="<?php echo $row['region'] ?>" selected><?php echo $kabnama; ?></option>
                            <?php
                                while($rowkab = mysqli_fetch_array($querykab)){
                            ?>
                            <option value="<?php echo $rowkab['kab_id'] ?>"> <?php echo $rowkab['kab_nama'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kecamatan" id="kecamatan" required autocomplete="off">
                            <option value="<?php echo $row['kecamatan'] ?>" selected><?php echo $kecnama; ?></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="village" id="village" required autocomplete="off">
                            <option value="<?php echo $row['village'] ?>" selected><?php echo $kelnama; ?></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="address" id="address" class="form-control" placeholder="Specific Address " required autocomplete="off"><?php echo $row['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="date" name="birth" id="birth" class="form-control" value="<?php echo $row['birthday'] ?>" placeholder="Birth Day " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $row['phone'] ?>" placeholder="Active Phone Number " required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select class="form-control" value="<?php echo $row['gender'] ?>" name="gender" id="gender" required autocomplete="off">
                            <option value="<?php echo $row['gender'] ?>">Male</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div id="pilihan" style="display: flex;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="width: 170px; height: 60px; font-size: 17px;" class="btn btn-info">SIMPAN PERUBAHAN </button>
                        </div>
                        <div id="aref" style="flex: 2;">
                        </div>
                    </div>
                </form>
              </div>
        </div>
      </div>
      
  </div>
    <!-- Content Header (Page header) -->
    

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../adminlte2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../adminlte2/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../adminlte2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../adminlte2/dist/js/adminlte.min.js"></script>
<script src="../adminlte2/dist/js/pages/dashboard.js"></script>
<script>
    //alert('tes');
    // $("#tombol").click(function() {  
    //     var file= $("#file").val();
    //     //alert(username + password);
    //         $.ajax({
    //             type: "POST",
    //             url: "update_profile.php",
    //             data: {"file":file},
    //             success: function(msg){
    //                 alert("Login Berhasil :  "+msg);
    //         }
            
    //     });
    // });
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        oFReader.onload = function (oFREvent)
         {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    $(document).ready(function(){
        $('#region').change(function(){
            //$('#modal-loading').modal('show');
            var kab_id = $("#region").val();
            //alert(kab_id);
            $.ajax({
                type: 'POST',
                url: '../register/kecamatan.php',
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
                url: '../register/kelurahan.php',
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
</body>
<!-- <script type="text/javascript" src="../asets/jquery-3.2.1.min.js" ></script> -->
</html>


