<?php
include 'server/connection.php';


    $no_ktm = $_POST['no_ktm'];
    $no_stnk = ($_POST['no_stnk']);
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $tanggal = date('Y-m-d', strtotime('+1 month'));

    $query = "INSERT into membership values('',$no_ktm,'$jenis_kendaraan','$tanggal',$no_stnk)";
    $result = mysqli_query($conn,$query);

    if ($result) {
        header("location: login.php");
    } else {
        header("location: regis.html?error=Registrasi+gagal");
    }

    header("location: login.php");
?>