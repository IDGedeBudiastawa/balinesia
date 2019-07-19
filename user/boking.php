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
<h1 style="text-align: center; font-size: 40px; color: #487eb0;">RIWAYAT TRANSAKSI BANTEN</h1><br>

<table class="table table-striped">
    <tr>
        <th>Nama Banten</th>
        <th>Kategori Banten</th>
        <th>Penjual</th>
        <th>Alamat</th>
        <th>Kontak</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
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
        $query = "SELECT *, user.full_name, sarana.sar_nama, sar_kategori.sarkat_nama FROM order_product, user, sarana, sar_kategori WHERE sarana.sarana_id = order_product.id_sarana AND sarana.user_id = user.user_id AND sarana.sarkat_id = sar_kategori.sarkat_id AND order_product.user_id = '$id'";// LIMIT $batas_bawah, $batas_atas
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($row = $res->fetch_assoc()) {
                    echo "<tr border='1'>";
                    echo "<td>" . $row["sar_nama"]. "</td><td>" . $row["sarkat_nama"]. "</td><td>" . $row["full_name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["phone"]. "</td><td>" .$row["price_product"]. "</td><td>" .$row["jumlah"]. "</td><td>" .$row["price_total"]. "</td>";
                    echo "<td><a href='u_sarana_bukti.php?data_id=".$row['order_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Bukti Transfer</a></td>";
                    if($row['Order_status'] == 0){
                        $status = "Belum Divalidasi";
                    }else{
                        $status = "Valid";
                    }
                    if ($row['order_path'] == "") {
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