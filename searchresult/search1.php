    <?php
        include '../connect.php';
        $key = $_GET['key'];
        $perpage = 100;
        $query = "SELECT * FROM event, ev_kategori, fot_event WHERE ev_kategori.evkat_id = event.event_id AND fot_event.event_id = event.event_id AND event.event_nama LIKE '$key%'";// LIMIT $batas_bawah, $batas_atas
        $result = $conn->query($query);
        $total = mysqli_num_rows($result);
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($rowba = $res->fetch_assoc()) {
                    echo "<a style='align-item: center; text-decoration: none;' href='../upacara/form_undangan.php?data_id=".$rowba['event_id']."' id='custId' data-toggle='modal'>";
                    echo "<div class='card' style='width: 18rem; background-color: #f5f6fa; border-radius: 10px; float: left; margin-left : 20px; height: 250px; margin-top: 20px'>";
                    echo "<img class='card-img-top' src='../upacara/".$rowba['url_event']."' alt='Card image cap' style='width: 100%; height: 100px;'>";
                    echo "<div class='card-body'>";
                    echo "<h3 class='card-title' style='color: black; text-align: center; margin-top: 0px;'>".$rowba['event_nama']."</h3>";
                    echo "<p style='color: black; text-align: center; margin-top: -5px;'>".$rowba['evkat_nama']."</p>";
                    echo "<p class='card-text' style='color: black; text-align: center; margin-top: -5px;'>".$rowba['des_event']."</p>";
                    echo "<p style='text-align: center; margin-top: -5px;'>Sisa : ".$rowba['slot_member']."</p>";
                    echo "<a style='text-align: center' href='../upacara/form_undangan.php?data_id=".$rowba['event_id']."' id='custId' data-toggle='modal'><p style='text-align: center; margin-top: -5px;'>Daftar<p></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
                                
            }else {
                // echo "<b>Belum ada event terdaftar.</b>";
            }
            $conn->close();
    ?>