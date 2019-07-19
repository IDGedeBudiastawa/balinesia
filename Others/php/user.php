<?php 
    include("../php/connect.php");
    session_start();
    $myusername = $_SESSION['login_user'];
    $get_user = "SELECT full_name FROM user WHERE username = '$myusername'";
    $result = $conn->query($get_user);
    $row = $result->fetch_assoc();
?>

<html>
<head>
    <title>Balinesia</title>
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <script type="text/javascript" src="../jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="../jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
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
                    <img style="margin-top: -10px; margin-left : 10px; width: 90px"; height="90px;" src="../img/logo1.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <div class="form-group">
                        <input style="margin-top: -10px; width: 300px;" type="text" id="nama" class="form-control" name="keywords" placeholder="Ketikkan kata kunci " required autocomplete="off">
                    </div>
                    <div id="button">
                        <button type="submit" style="margin-top: -11px; width: 100px;" class="btn btn-info">Cari</button>
                    </div>
                    <div id="logout">
                        <a href="../php/logout.php" id="tomreg">Logout</a>
                    </div>
                    
                </div>
        </div>
        <div id="body">
            <div id="add">
                <button style="float: right;" type="submit" class="btn btn-success btn-md"><a style="text-decoration: none; color:aliceblue;" href="../html/input.html">+ Tambah Event</a></button>
            </div>
            <div class="isi">
                
                <div id="view">
                    <table class="table table-striped">
                        <tr>
                            <th>Kategori </th>
                            <th>Nama Event </th>
                            <th>Deskripsi </th>
                            <th>Biaya </th>
                            <th>Jumlah Peserta </th>
                            <th>Lokasi </th>
                            <th>Tanggal </th>
                            <th>Edit </th>
                            <th>Delete </th>
                            
                        </tr>
                        <?php
                            include 'connect.php';
                            $jml_cont = 5;
                            //$pages = ceil(mysql_result($page_query, 0) / $per_page);
 
                            $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                            $page_query = "SELECT * FROM event";
                            $result = $conn->query($page_query);
                            $total = mysqli_num_rows($result);
                            $pages = $total/5;
                            // $mulai = ($pages-1)*$halaman;
                            // $no = $mulai+1;                
                            $batas_bawah = ($page-1)*$jml_cont+1;
                            $batas_atas = $page*$jml_cont;
                            $query = "SELECT event_id, evkat_id, event_nama,des_event, price_ev, slot_member, ev_place, ev_date FROM event";// LIMIT $batas_bawah, $batas_atas
                            $res = $conn->query($query);

                            if ($total > 0) {
                                // output data of each row
                                
                                while($row = $res->fetch_assoc()) {
                                    echo "<tr border='1'>";
                                    echo "<td>" . $row["evkat_id"]. "</td><td>" . $row["event_nama"]. "</td><td>" . $row["des_event"]. "</td><td>" . $row["price_ev"]. "</td><td>" . $row["slot_member"]. "</td><td>" .$row["ev_place"]. "</td><td>" .$row["ev_date"]."</td>";
                                    echo "<td><a href='editevent.php?data_id=".$row['event_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Edit</a></td>";
                                    echo "<td><a href='evdelete.php?data_id=".$row['event_id']."' class='btn btn-danger' id='custId' data-toggle='modal'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                
                            } else {
                                echo "<b>Belum ada event terdaftar.</b>";
                            }
                            if($pages >= 1 && $page <= $pages){
                                for($x=1; $x<=$pages; $x++){
                                    echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
                                }
                            }
                            $conn->close();

                        ?>
                    </table>
                    <div class="">
                        <?php
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 60%; margin-top: 40px; width: 100px; float: left;"; height="100px;" src="../img/logo1.png">
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

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('event_id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'tampil.php',
                data :  'rowid='+ rowid,
            });
         });
    });
</script> -->