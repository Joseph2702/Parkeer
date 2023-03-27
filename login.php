<?php

session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: member.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $no_ktm = $_POST['no_ktm'];
    $no_stnk = ($_POST['no_stnk']);

    $query = "SELECT * FROM membership
        WHERE no_ktm = ? AND no_stnk = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $no_ktm, $no_stnk);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $id_member,
            $no_ktm,
            $jenis_kendaraan,
            $masa_berlaku,
            $no_stnk
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['id_membership'] = $id_member;
            $_SESSION['no_ktm'] = $no_ktm;
            $_SESSION['jenis_kendaraan'] = $jenis_kendaraan;
            $_SESSION['masa_berlaku'] = $masa_berlaku;
            $_SESSION['no_stnk'] = $no_stnk;
            $_SESSION['logged_in'] = true;

            header('location:member.php?message=Logged in successfully');
        } else {
            header('location:login.php?error=Could not verify your account');
        }
    } else {
        // Error
        header('location: login.php?error=Something went wrong!');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <header>
        <img src="img/logo.png" alt="">
    </header>
    <center>
        <form id="login-form" method="POST" action="login.php">
            </div>
            <table class="tabel_isi">
                <tr>
                    <th class="atas">
                        <h1 class="isi_atas">Membership Parkir</h1>
                    </th>
                </tr>
                <tr>
                    <th> <input type="text" name="no_ktm" class="inputan" placeholder="No KTM"> </th>
                </tr>
                <tr>
                    <th> <input type="text" name="no_stnk" class="inputan" placeholder="No Plat Kendaraan"> </th>
                </tr>
                <tr>
                    <th> <br> <input type="submit" class="site-btn" id="login-btn" name="login_btn" value="LOGIN" />
                    </th>
                </tr>
                <tr>
                    <td><br>
                        <p class="pilihan">Belum Mememiliki Akun ? <a href="regis.php"> Register</a>
                    </td>
                </tr>
                <tr class="loginbawah">
                    <td>
                        <p class="pilihan">Login Sebagai ? <a href="loginAdmin.php"> Admin</a> </p>
                        <br>
                    </td>
                </tr>

            </table>

            </from>
    </center>
    <h1></h1>

    <footer class="footer">
        <p>Ini adalah footer</p>
    </footer>
</body>

</html>


<style>
    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }


    .tabel_isi {
        margin-top: 15%;
        width: 45%;
        background-color: grey;
        background-color: rgba(128, 128, 128, 0.4);

    }

    header {
        position: absolute;
        background-color: #FD841F;
        width: 100%;
        height: 60px;
        top: 0;
        left: 0;
    }

    header img {
        margin-top: 10px;
        margin-left: 7px;
        height: 40px;
    }

    .inputan {
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
    }

    .footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background-color: #001253;
        text-align: center;
        color: white;
        
    }
</style>