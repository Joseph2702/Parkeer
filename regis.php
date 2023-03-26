<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h2>Logo</h2>
    </header>

    <center>
        <table class="tabel_isi">
            <form action="actionRegis.php" method="POST">
                
            </div>
                </div>
                <tr>
                    <th class="atas">
                        <h1 class="isi_atas">Buat Membeship Parkir</h1>
                    </th>
                </tr>
                <tr>
                    <th> <input type="text" name="no_ktm" class="inputan_ktm" placeholder="No KTM"> </th>
                </tr>
                <tr>
                    <th> <input type="text" name="no_stnk" class="inputan_stnk" placeholder="No Plat Kendaraan"> </th>
                </tr>
                <tr>
                    <th>
                        <select name="jenis_kendaraan">
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>
                        <button type="submit" class="btn_submit"> Submit</button>
                    </th>
                </tr>
                <tr class="kembali">
                    <th>
                        <a href="login.php">Kembali</a> <br>
                    </th>
                </tr>
            </form>

        </table>
    </center>
    <div id="error-message"></div>
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

    .tabel_isi {
        margin-top: 15%;
        width: 45%;
        background-color: grey;
        background-color: rgba(128, 128, 128, 0.4);

    }

    .inputan_ktm {
        width: 70%;
        height: 25px;
    }

    .inputan_stnk {
        margin-top: 1%;
        width: 70%;
        height: 25px;
    }

    select {
        margin-top: 5px;
        margin-bottom: 5px;
        width: 71%;
        height: 27px;
    }

    .btn_submit {
        width: 71%;
        height: 27px;
    }

    .kembali {
        height: 50px;
    }
</style>