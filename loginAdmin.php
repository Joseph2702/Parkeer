<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location:listMemberAdmin.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $pin = ($_POST['pin']);

    $query = "SELECT * FROM admin
        WHERE pin = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('s',$pin);
    
    if ($stmt_login->execute()) {
        $stmt_login->bind_result($pin);
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['pin'] = $pin;
            $_SESSION['logged_in'] = true;

            header('location:listMemberAdmin.php?message=Logged in successfully');
        } else {
            header('location:loginAdmin.php?error=Could not verify your account');
        }
    } else {
        // Error
        header('location: loginAdmin.php?error=Something went wrong!');
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <header>
        <h2>Logo</h2>
    </header>

    <center>
        <form id="login-form" method="POST" action="loginAdmin.php">
            </div>
            <table class="tabel_isi">
                <tr>
                    <th class="atas">
                        <h1 class="isi_atas">MASUK SEBAGAI ADMIN</h1>
                    </th>
                </tr>
                <tr>
                    <th> <input type="text" name="pin" class="inputan" placeholder="pin"> </th>
                </tr>
                <tr>
                    <th> <br> <input type="submit" class="site-btn" id="login-btn" name="login_btn" value="LOGIN" />
                    </th>
                </tr>
                <tr class="loginbawah">
                    <td>
                        <center>
                            <a href="login.php">Kembali</a>
                            <br>
                        </center>
                    </td>

                </tr>

            </table>

            </from>
    </center>
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
        margin-top: 15%;
        width: 45%;
        background-color: grey;
        background-color: rgba(128, 128, 128, 0.4);

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
        height: 50px;
        background-color: #001253;
        text-align: center;
        color: white;

    }
</style>