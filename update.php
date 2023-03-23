<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tas_php";
    $connection = new mysqli($servername, $username, $password, $database);

    $nim = "";
    $nama_lengkap = "";
    $kota_asal = "";
    $tanggal_lahir = "";
    $nama_orang_tua = "";
    $alamat_orang_tua = "";
    $kode_pos = "";
    $nomor_telepon = "";
    $status_mhs = "";
    $dosen_wali = "";

    $errorMessage="";
    $successMessage="";

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $nim = $_POST["nim"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $kota_asal = $_POST["kota_asal"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $nama_orang_tua = $_POST["nama_orang_tua"];
        $alamat_orang_tua = $_POST["alamat_orang_tua"];
        $kode_pos = $_POST["kode_pos"];
        $nomor_telepon = $_POST["nomor_telepon"];
        $status_mhs = $_POST["status_mhs"];
        $dosen_wali = $_POST["dosen_wali"];

        do {
            // Cek apakah semua kolom sudah terpenuhi
            if (empty($nim) || empty($nama_lengkap) || empty($kota_asal) || empty($tanggal_lahir) || empty($nama_orang_tua) || empty($alamat_orang_tua)  || empty($kode_pos) || empty($nomor_telepon) || empty($status_mhs) || empty($dosen_wali)) {
                $errorMessage = "Error! Silahkan isi semua kolom!";
                break;
            }

            // Proteksi NIM
            if (!preg_match("/^([0-9]{9,9})$/", $nim)) {
                $errorMessage = "NIM harus 9 digit dan angka semua!";
                break;
            }

            // Proteksi Kode Pos
            if (!preg_match("/^([0-9]{5,5})$/", $kode_pos)) {
                $errorMessage = "Kode pos harus 5 digit dan angka semua!";
                break;
            }

            // Proteksi Nomor Telepon
            if (!preg_match("/^([0-9]{12,12})$/", $nomor_telepon)) {
                $errorMessage = "Nomor telepon harus 12 digit dan angka semua!";
                break;
            }

            // Update data mahasiswa yang sudah ada di database
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "UPDATE `tas_php_table` SET `nim` = '$nim', `nama_lengkap` = '$nama_lengkap', `kota_asal` = '$kota_asal', `tanggal_lahir` = '$tanggal_lahir', `nama_orang_tua` = '$nama_orang_tua', `alamat_orang_tua` = '$alamat_orang_tua', `kode_pos` = '$kode_pos', `nomor_telepon` = '$nomor_telepon', `status_mhs` = '$status_mhs', `dosen_wali` = '$dosen_wali' WHERE `id`= '$id'";
                $result = $connection->query($sql);
            }

            if (!$result) {
                $errorMessage="Salah query!".$connection->error;
                break;
            }

            $no = "";
            $nim = "";
            $nama_lengkap = "";
            $kota_asal = "";
            $tanggal_lahir = "";
            $nama_orang_tua = "";
            $alamat_orang_tua = "";
            $kode_pos = "";
            $nomor_telepon = "";
            $status_mhs = "";
            $dosen_wali = "";

            $successMessage = "Update berhasil!";

            header("location:/TASWebProgramming/index.php");
            exit;
        } while(false);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Teman</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="monofont bg-dark text-white">
        <div class="container my-2 py-2">
            <h4 class="text-center pt-2">Update Mahasiswa</h4>
            <hr>
            <?php
                if (!empty($errorMessage)) {
                    echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }
            ?>

            <form method="post">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">NIM</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" minlength="9" maxlength="9" name="nim" value="<?php echo $nim;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $nama_lengkap;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Kota Asal</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="kota_asal" value="<?php echo $kota_asal;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nama Orang Tua</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_orang_tua" value="<?php echo $nama_orang_tua;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Alamat Orang Tua</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat_orang_tua" value="<?php echo $alamat_orang_tua;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Kode Pos</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" minlength="5" maxlength="5" name="kode_pos" value="<?php echo $kode_pos;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" minlength="12" maxlength="12" name="nomor_telepon" value="<?php echo $nomor_telepon;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <select type="text" class="form-control" name="status_mhs">
                            <option value="TAMA">TAMA</option>
                            <option value="WREDA">WREDA</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Dosen Wali</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="dosen_wali" value="<?php echo $dosen_wali; ?>">
                    </div>
                </div>

                <?php
                    if (!empty($successMessage)) {
                        echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-danger" href="/TASWebProgramming/index.php" role="button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>