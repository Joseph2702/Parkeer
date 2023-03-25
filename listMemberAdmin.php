<?php
session_start();
include('server/connection.php');

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM membership WHERE id_membership LIKE '%$keyword%' or no_stnk
     LIKE '%$keyword%' or no_ktm LIKE '%$keyword%' ";
} else {
    $q = 'SELECT * FROM membership';
}
$result = mysqli_query($conn, $q);


if (!isset($_SESSION['logged_in'])) {
    header('location: admin.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['pin']);
        header('location: admin.php');
        exit;
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <title>LIST MEMBER MEMBERSHIP</title>
</head>

<body>
    <!------ Header Section ---->
    <header>

        <div class="container mt-4">
            <!-- <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>

            <script>
                function myFunction(x) {
                    x.myFunction.toggle("change");
                }
            </script> -->
            <form action="" method="post">
                <input type="text" name="keyword" placeholder="Masukkan Keyword">
                <button type="submit" class="btn btn-primary" name="cari">Cari</button>
            </form>
        </div>
        <h5><b>DATA MEMBER</b></h5>


    </header>
    <br><br>
    <table class="tabel_isi" border="2">
        <tr>
            <th>ID MEMBERSHIP</th>
            <th>NO_KTM</th>
            <th>TIPE KENDARAAN</th>
            <th>MASA BERLAKU</th>
            <th>NO PLAT</th>
            <th>HAPUS</th>
            <th>EDIT</th>
        </tr>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id_membership'] ?></td>
                    <td><?php echo $row['no_ktm'] ?></td>
                    <td><?php echo $row['jenis_kendaraan'] ?></td>
                    <td><?php echo $row['masa_berlaku'] ?></td>
                    <td><?php echo $row['no_stnk'] ?></td>
                    <td>
                        <a href="#" role="button" onclick="return confirm('Data ini akan dihapus?')">Hapus</a>
                    </td>
                    <td>
                        <a href="actionEdit.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <footer class="footer">
        <p>Ini adalah footer</p>
    </footer>
</body>

</html>
<style>
    header {
        position: absolute;
        background-color: #FD841F;
        width: 100%;
        height: 60px;
        top: 0;
        left: 0;

    }

    .tabel_isi {
        margin-top: 5%;
        width: 100%;
        background-color: grey;
        background-color: rgba(128, 128, 128, 0.4);
    }

    .container {
        display: inline-block;
        cursor: pointer;
    }

    .bar1 {}

    .bar2 {}

    .bar3 {
        width: 35px;
        height: 5px;
        background-color: black;
        border-radius: 15px;
        margin: 6;
        transition: 3s;
    }

    .change .bar1 {
        transform: translate(0, 11px) rotate(-45deg);
    }

    .change .bar2 {
        opacity: 0;
    }

    .change .bar3 {
        transform: translate(0, -11px) rotate(45deg);
    }

    /* .inputan {
        margin-top: 3%;
        width: 70%;
        height: 25px;
    }

    .site-btn {
        width: 71%;
        height: 35px;
    }

    .pilihan {
        margin-left: 15%;
        margin-top: 0;
        margin-bottom: 0;
    } */
    .text-indent {
        font-size: 24px;
    }

    .footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background-color: #001253;
        text-align: center;
        color: white;

    }
</style>