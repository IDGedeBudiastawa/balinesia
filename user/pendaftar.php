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

<div style="margin-left: -15%; margin-right: 0%; height: 100%;" class="isi">
<div style="margin-top:0px; position: absolute; width: 100%" class="tampil">
<div class="profil" style="width:  77%">
<h1 style="text-align: center; font-size: 40px; color: #487eb0;">RIWAYAT PENDAFTARAN UPACARA</h1><br>

<table class="table table-striped">
    <tr>
        <th>Nama Upacara</th>
        <th>Kategori Upacara</th>
        <th>Biaya</th>
        <th>Hari</th>
        <th>Nama Terdaftar</th>
        <th>Tempat</th>
        <th>Bukti Transfer</th>
        <th>Foto</th>
        <th>Status</th>

    </tr>
    <?php
        include '../connect.php';
        $uid = $_GET['uid'];
        $perpage = 100;
        //$pages = ceil(mysql_result($page_query, 0) / $per_page);
        $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
        $page_query = "SELECT * FROM event";
        $result = $conn->query($page_query);
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$perpage);
        // $mulai = ($pages-1)*$halaman;
        // $no = $mulai+1;                
        $batas_bawah = ($page>1) ? ($page * $perpage) - $perpage : 0;
        // $batas_atas = $page*$jml_cont;
        //echo $page;
        $query = "SELECT * FROM event, peserta, ev_kategori WHERE peserta.event_id = event.event_id AND event.evkat_id = ev_kategori.evkat_id AND peserta.user_p_id = '$id'";// LIMIT $batas_bawah, $batas_atas
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($row = $res->fetch_assoc()) {
                    echo "<tr border='1'>";
                    echo "<td>" . $row["event_nama"]. "</td><td>" . $row["evkat_nama"]. "</td><td>" . $row["price_ev"]. "</td><td>" . $row["ev_date"]. "</td><td>" . $row["fullname"]. "</td><td>" .$row["ev_place"]. "</td>";
                    echo "<td><a href='u_peserta_bukti.php?data_id=".$row['peserta_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Bukti Transfer</a></td>";
                    if($row['status'] == 0){
                        $status = "Belum Divalidasi";
                    }else{
                        $status = "Valid";
                    }
                    if ($row['peserta_path'] == "") {
                        $foto = "Belum Diunggah";
                    }else{
                        $foto = "Menunggu Validasi";
                    }
                    echo "<td><a href='#' class='btn btn-info' id='custId' data-toggle='modal'>" .$foto. "</a></td>";
                    echo "<td><a href='#' class='btn btn-danger' id='custId' data-toggle='modal'>" .$status. "</a></td>";
                    echo "</tr>";
                }
                                
            }else {
                echo "<b>Belum ada event terdaftar.</b>";
            }
            $conn->close();
    ?>
</table>
<div class="page">
    <nav>
        <u class="pagination" style="float: right;">
            <li>
                <a href="?halaman=<?php echo $i; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
            <?php for ($i=1; $i<=$pages ; $i++){ ?>
            <li>
                <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php } ?>
            <li>
                <a href="?halaman=<?php echo $i; ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
            </li>
        </u>
    </nav>
</div>
</div>

</div>
</div>