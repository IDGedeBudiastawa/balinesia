<?php 
    include("../connect.php");
    session_start();
    $myusername = $_SESSION['login_user'];
    $user_pass = $_SESSION['login_pass'];
    $get_user = "SELECT * FROM user WHERE username = '$myusername'";
    $result = $conn->query($get_user);
    $row = $result->fetch_assoc();
    $id = $row['user_id'];
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Upacara Anda</title>

  <script type="text/javascript" src="../asets/jquery-1.7.1.min.js"></script>
  <link rel="stylesheet" href="../adminlte2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../adminlte2/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../adminlte2/dist/css/AdminLTE.min.css">
  <!-- <style>
      .sidenu ul li{
          margin-top: 20px;
      }
  </style> -->
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
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
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
            <li class="alatup" style="margin-top: 10px;"><a href="v_pembeli.php"><i class="glyphicon glyphicon-folder-open"></i> Riwayat Transaksi</a></li>
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

            <input type="hidden" name="uid" id="uid" value="<?php echo $id ?>" class="form-control">
            <div id="v_content"></div>

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
<script type="text/javascript">
  // alert('tes');

  $(document).ready(function(){
    $('#alert').hide()
    // alert('tes2');
    load_table();
  });

  function load_table(offset=1){
    $('#modal-loading').modal('show');
    var uid = $('#uid').val();
    offset = (offset-1) * 50
    // console.log(uid);
    $.ajax({
      url: 'pendaftar.php',
      type: 'get',
      data: 'uid=' +uid,
      success: function(data){
        $('#modal-loading').modal('hide');
        $('#v_content').html(data);
        $('#page').on('click', function(){
          var offset = $('#page').val();
          load_table(offset);
        });
      },

      error: function(XMLHttpRequest){
        alert(XMLHttpRequest.responseText);
      }
    });
  }
</script>
</body>
<!-- <script type="text/javascript" src="../asets/jquery-3.2.1.min.js" ></script> -->
</html>


