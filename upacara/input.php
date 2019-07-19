<?php 
    include("../connect.php");
    $isiform = array();
    for($i=0;$i<9;$i++) {
        if(isset($_POST['check_'.$i])===TRUE) {
            array_push($isiform,1);
        }
        else {
            array_push($isiform,0);
        }
    }
    $data_id = $_POST["data_id"];
    $sql = "UPDATE event SET form = ".implode($isiform)." WHERE event_id = '$data_id'";
    if($conn->query($sql) === TRUE) {
        header("Location: index.php");
    }
    else {
        echo("Periksa Koneksi Anda !");
        echo implode($isiform);
    }
?>