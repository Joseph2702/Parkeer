<?php
include 'connection.php';

$id = $_GET['id_membership'];

$query = "delete from membership where id_membership='$id'";

if (mysqli_query($conn, $query)) {
    header('location: ../listMemberAdmin.php');
} else {
    echo "hapus data tidak berhasil";
}

die();
?>