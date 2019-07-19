<div style="margin-left: -15%; margin-right: 0%; height: 100%;" class="isi">
<div style="margin-top:0px; position: absolute; width: 100%" class="tampil">
<div class="profil" style="width:  77%">
<h1 style="text-align: center; font-size: 40px; color: #487eb0;">BANTEN TERSEDIA</h1><br>

<table class="table table-striped">
    <tr>
        <th>Kategori</th>
        <th>Nama Banten</th>
        <th>Deskripsi</th>
        <th>Tempat</th>
        <th>Jumlah Stock</th>
        <th>Harga</th>
        <th>Jenis Order</th>
        <th>Detail</th>
        <th>Edit</th>
        <th>Delete</th>
                          
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
        $query = "SELECT sarana_id, sarkat_nama, sar_nama, des_sar, dibuat, stock_sar, sar_price, pilihan FROM sarana JOIN sar_kategori ON sarana.sarkat_id = sar_kategori.sarkat_id WHERE user_id = '$uid' LIMIT $batas_bawah, $perpage";// LIMIT $batas_bawah, $batas_atas
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($row = $res->fetch_assoc()) {
                    echo "<tr border='1'>";
                    echo "<td>" . $row["sarkat_nama"]. "</td><td>" . $row["sar_nama"]. "</td><td>" . $row["des_sar"]. "</td><td>" . $row["dibuat"]. "</td><td>" . $row["stock_sar"]. "</td><td>" .$row["sar_price"]. "</td><td>" .$row["pilihan"]."</td>";
                    echo "<td><a href='#?data_id=".$row['sarana_id']."' class='btn btn-info' id='custId' data-toggle='modal'>Detail</a></td>";
                    echo "<td><a href='../banten/edit_banten.php?data_id=".$row['sarana_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Edit</a></td>";
                    echo "<td><a href='../banten/deletebanten.php?data_id=".$row['sarana_id']."' class='btn btn-danger' id='custId' data-toggle='modal'>Delete</a></td>";
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