<?php
include 'connection.php';
$noKTM = $_POST['inputNoKTM'];
$noSTNK = $_POST['inputNoSTNK'];
$jenisKendaraan = $_POST['inputJenisKendaraan'];
$query = "UPDATE `membership` SET `no_ktm` = $noKTM, `jenis_kendaraan` = $jenisKendaraan, `no_stnk` = $noSTNK WHERE `membership`.`id_membership` = 1";

mysqli_query($conn, $query);

header('location: ../welcome.php');
?>