<?php
session_start();
include('server/connection.php');


if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM membership WHERE no_ktm LIKE '%$keyword%'";
} else {
    $q = 'SELECT * FROM membership';
}

$result = mysqli_query($conn, $q);

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

// if (!isset($_SESSION['logged_in'])) {
//     header('location: actionEdit.php');
//     exit;
// }

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['no_ktm']);
        header('location: login.php');
        exit;
    } else {
        echo "Session logged_in tidak ditemukan.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <table class="table">

        <tr>
            <td colspan="4">
                <h3>ID Membership : <?php echo $_SESSION['id_membership'] ?> </h3>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h3>No KTM : <?php echo $_SESSION['no_ktm'] ?> </h3>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h3>No STNK : <?php echo $_SESSION['no_stnk'] ?> </h3>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h3>Tipe Kendaraan : <?php echo $_SESSION['jenis_kendaraan'] ?> </h3>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h3>Masa Berlaku : <?php echo $_SESSION['masa_berlaku'] ?> </h3>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <hr class="garis">
            </td>
        </tr>

    </table>
    <button class="t_logout"> <a href="member.php?logout=1" id="logout-btn" class="btn btn-danger">LOG OUT</a> </button>
</body>

</html>