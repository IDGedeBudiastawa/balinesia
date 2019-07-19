<div style="margin-left: -15%; margin-right: 0%; height: 100%;" class="isi">
<div style="margin-top:0px; position: absolute; width: 100%" class="tampil">
<div class="profil" style="width:  77%">
<h1 style="text-align: center; font-size: 40px; color: #487eb0;">EVENT ANDA</h1><br>

<table class="table table-striped">
    <tr>
        <th>Kategori</th>
        <th>Nama Event</th>
        <th>Deskripsi</th>
        <th>Biaya</th>
        <th>Jumlah Peserta</th>
        <th>Lokasi</th>
        <th>Tanggal</th>
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
        $query = "SELECT event_id, evkat_nama, event_nama,des_event, price_ev, slot_member, ev_place, ev_date FROM event JOIN ev_kategori ON event.evkat_id = ev_kategori.evkat_id WHERE user_id = '$uid' LIMIT $batas_bawah, $perpage";// LIMIT $batas_bawah, $batas_atas
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($row = $res->fetch_assoc()) {
                    echo "<tr border='1'>";
                    echo "<td>" . $row["evkat_nama"]. "</td><td>" . $row["event_nama"]. "</td><td>" . $row["des_event"]. "</td><td>" . $row["price_ev"]. "</td><td>" . $row["slot_member"]. "</td><td>" .$row["ev_place"]. "</td><td>" .$row["ev_date"]."</td>";
                    echo "<td><a href='#?data_id=".$row['event_id']."' class='btn btn-info' id='custId' data-toggle='modal'>Detail</a></td>";
                    echo "<td><a href='../upacara/editevent.php?data_id=".$row['event_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Edit</a></td>";
                    echo "<td><a href='../upacara/evdelete.php?data_id=".$row['event_id']."' class='btn btn-danger' id='custId' data-toggle='modal'>Delete</a></td>";
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