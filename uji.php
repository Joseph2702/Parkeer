<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Navbar</span>
    </nav>

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
                <p class="pilihan">Login Sebagai ? <a href="admin.php"> Admin</a> </p>
                <br>
            </td>
        </tr>


    </table>

    <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
</body>

</html>