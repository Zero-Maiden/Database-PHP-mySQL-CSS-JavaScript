<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database Mahasiswa</title>
        <link href="style.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    </head>
    <body class="bg-dark monofont text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 bg-dark rounded my-2 py-2">
                    <h4 class="text-center pt-2">Database Mahasiswa</h4>
                    <hr>
                    <a class="btn btn-info my-2" href="/TASWebProgramming/create.php" role="button">Tambah Mahasiswa</a>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>NamaLgkp</th>
                                <th>KotaAsal</th>
                                <th>TglLahir</th>
                                <th>NamaOrtu</th>
                                <th>AlamatOrtu</th>
                                <th>KodePos</th>
                                <th>NoTelp</th>
                                <th>Status</th>
                                <th>DosenWali</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $servername="localhost";
                                $username="root";
                                $password="";
                                $database="tas_php";

                                // Membuat koneksi
                                $connection = new mysqli($servername, $username, $password, $database);

                                // Cek koneksi
                                if ($connection->connect_error) {
                                    die("Gagal nyambung ke database!".$connection->error);
                                }

                                // Membaca semua data
                                $sql = "SELECT * FROM tas_php_table"; $result = $connection->query($sql);
                                if (!$result) {
                                    die("Gagal ambil data!".$connection->error);
                                }

                                // Ambil data perbaris
                                while ($row=$result->fetch_assoc()) {
                                    echo "
                                        <tr>
                                        <td>$row[id]</td>
                                        <td>$row[nim]</td>
                                        <td>$row[nama_lengkap]</td>
                                        <td>$row[kota_asal]</td>
                                        <td>$row[tanggal_lahir]</td>
                                        <td>$row[nama_orang_tua]</td>
                                        <td>$row[alamat_orang_tua]</td>
                                        <td>$row[kode_pos]</td>
                                        <td>$row[nomor_telepon]</td>
                                        <td>$row[status_mhs]</td>
                                        <td>$row[dosen_wali]</td>
                                            <td>
                                                <a class='btn btn-primary btn-sm' href='/TASWebProgramming/update.php?id=$row[id]'>Update</a>
                                                <a class='btn btn-danger btn-sm' href='/TASWebProgramming/delete.php?id=$row[id]'>Delete</a>
                                            </td>
                                        </tr>
                                    ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script src="js/index_javascript.js"></script>
    </body>
</html>