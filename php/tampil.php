<?php
    include 'connect.php';
 
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "DELETE * FROM event WHERE id = $id";
        $result = $koneksi->query($sql);
        header("location: ../php/user.php");
 
        }
    }
    $koneksi->close();
?>