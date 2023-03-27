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
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkeer | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        #header {
            background-color: #FD841F;
        }

        #footer {
            background-color: #001253;
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Edit Modals -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Member</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" id="inputNoKTM"
                                    placeholder="NO KTM">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg" id="inputNoKTM"
                                    placeholder="PLAT NO KENDARAAN">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option selected disabled>TIPE KENDARAAN</option>
                                    <option value="Sepeda">Sepeda</option>
                                    <option value="Motor">Motor</option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Truk">Truk</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <!-- Header -->
    <section id="header" class="container-fluid" style="max-width: 1920px;">
        <h1 class="py-5 mb-5">Data Member</h1>
    </section>
    <!-- Tabel -->
    <section id="tabel" class="container-fluid" style="max-width: 1920px;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID MEMBERSHIP</th>
                    <th>NO_KTM</th>
                    <th>TIPE KENDARAAN</th>
                    <th>MASA BERLAKU</th>
                    <th>NO PLAT</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $i++; ?>
                    <tr>
                        <td>
                            <?= $i; ?>
                        </td>
                        <td>
                            <?= $row['id_membership']; ?>
                        </td>
                        <td>
                            <?= $row['no_ktm']; ?>
                        </td>
                        <td>
                            <?= $row['jenis_kendaraan']; ?>
                        </td>
                        <td>
                            <?= $row['masa_berlaku']; ?>
                        </td>
                        <td>
                            <?= $row['no_stnk']; ?>
                        </td>
                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Edit
                                </button>
                                <!-- <a class="btn btn-primary" href="actionEdit.php?no_ktm=<?= $row['no_ktm']; ?>">Edit</a> -->
                                <a class="btn btn-danger" href="#" role="button"
                                    onclick="return confirm('Data ini akan dihapus?')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <!-- Footer -->
    <section id="footer" class="container-fluid d-flex align-items-center flex-column fixed-bottom py-2">
        <p class="pt-3">© 2000 - Company, Inc. All rights reserved. Address Address</p>
        <div class="d-flex grid gap-0 column-gap-3 pb-3">
            <a href="#" class="link-light">Item 1</a>
            <a href="#" class="link-light">Item 2</a>
            <a href="#" class="link-light">Item 3</a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <script type="text/javascript">

    </script>
</body>

</html>