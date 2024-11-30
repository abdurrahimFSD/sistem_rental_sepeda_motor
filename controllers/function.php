<?php

if (file_exists('./config/connection.php')) {
    include('./config/connection.php');
} elseif (file_exists('../config/connection.php')) {
    include('../config/connection.php');
} else {
    die('Connection file not found');
}

// Function fecthData untuk mengambil semua data dari table
function fetchData($tableName) {
    global $connection;

    // Membuat query SQL untuk memilih semua data dari table yg namanya diberikan melalui parameter $tableName
    $queryFecthData = "SELECT * FROM $tableName";

    // Menjalankan query SQL
    $resultFetchData = mysqli_query($connection, $queryFecthData);

    // Menyiapkan array kosong untuk menyimpan data dari query
    $data = [];

    // Mengambil setiap baris data dari query dan menambahkannya ke dalam array $data
    while ($row = mysqli_fetch_assoc($resultFetchData)) {
        $data[] = $row;
    }

    // Mengembalikan array $data yg berisi semua baris data dari table
    return $data;
}

// Function motorCreate untuk menambahkan data sepeda motor baru
function motorCreate($data) {
    global $connection;

    // Ambil data motor dari array $data
    $noPolisi = $data['noPolisi'];
    $merk = $data['merk'];
    $kategori = $data['kategori'];

    // Mengecek apakah no polisi sudah ada
    $queryCekNoPolisi = "SELECT * FROM motor WHERE no_polisi = '$noPolisi'";
    $resultCekNoPolisi = mysqli_query($connection, $queryCekNoPolisi);
    if (mysqli_num_rows($resultCekNoPolisi) > 0) {
        // Jika no polisi sudah ada, kembalikan pesan error
        $existingNoPolisi = mysqli_fetch_assoc($resultCekNoPolisi);
        return $existingNoPolisi['no_polisi'];
    } else {
        // Jika no polisi belum ada, simpan data motor ke database
        $queryCreateMotor = "INSERT INTO motor (no_polisi, merk, kategori) VALUES ('$noPolisi', '$merk', '$kategori')";
        $resultCreateMotor = mysqli_query($connection, $queryCreateMotor);

        // Kembalikan pesan sukses
        if ($resultCreateMotor) {
            return 'success';
        } else {
            return 'error';
        }
    }
}

// Function motorUpdate untuk mengupdate data sepeda motor
function motorUpdate($data) {
    global $connection;

    // Ambil data motor dari array $data    
    $idMotor = $data['idMotor'];
    $noPolisi = $data['noPolisi'];
    $merk = $data['merk'];
    $kategori = $data['kategori'];

    // Mengecek apakah no polisi sudah ada
    $queryCekNoPolisi = "SELECT * FROM motor WHERE no_polisi = '$noPolisi' AND id_motor != '$idMotor'";
    $resultCekNoPolisi = mysqli_query($connection, $queryCekNoPolisi);
    if (mysqli_num_rows($resultCekNoPolisi) > 0) {
        // Jika no polisi sudah ada, kembalikan pesan error        
        $existingNoPolisi = mysqli_fetch_assoc($resultCekNoPolisi);
        return $existingNoPolisi['no_polisi'];
    } else {
        // Jika no polisi belum ada, simpan data motor ke database
        $queryUpdateMotor = "UPDATE motor SET no_polisi = '$noPolisi', merk = '$merk', kategori = '$kategori' WHERE id_motor = '$idMotor'";
        $resultUpdateMotor = mysqli_query($connection, $queryUpdateMotor);

        // Kembalikan pesan sukses
        if ($resultUpdateMotor) {
            return 'success';
        } else {
            return 'error';
        }
    }
}

// Function motorDelete untuk menghapus data sepeda motor
function motorDelete($idMotor) {
    global $connection;

    $queryDeleteMotor = "DELETE FROM motor WHERE id_motor = '$idMotor'";
    $resultDeleteMotor = mysqli_query($connection, $queryDeleteMotor);

    if ($resultDeleteMotor) {
        return 'success';
    } else {
        return 'error';
    }
}

// Function penyewaCreate untuk menambahkan data penyewa baru
function penyewaCreate($data) {
    global $connection;

    // Ambil data penyewa dari array $data
    $namaPenyewa = $data['namaPenyewa'];
    $nomorTelepon = $data['nomorTelepon'];
    $alamat = $data['alamat'];

    // Mengecek apakah no telepon sudah ada
    $queryCekNoTelepon = "SELECT * FROM penyewa WHERE no_telepon = '$nomorTelepon'";
    $resultCekNoTelepon = mysqli_query($connection, $queryCekNoTelepon);
    if (mysqli_num_rows($resultCekNoTelepon) > 0) {
        // Jika no telepon sudah ada, kembalikan pesan error
        $existingNoTelepon = mysqli_fetch_assoc($resultCekNoTelepon);
        return $existingNoTelepon['no_telepon'];
    } else {
        // Jika no telepon belum ada, simpan data penyewa ke database
        $queryCreatePenyewa = "INSERT INTO penyewa (nama_penyewa, no_telepon, alamat) VALUES ('$namaPenyewa', '$nomorTelepon', '$alamat')";
        $resultCreatePenyewa = mysqli_query($connection, $queryCreatePenyewa);

        // Kembalikan pesan sukses
        if ($resultCreatePenyewa) {
            return 'success';
        } else {
            return 'error';
        }
    }
}

// Function penyewaUpdate untuk mengupdate data penyewa
function penyewaUpdate($data) {
    global $connection;    

    // Ambil data penyewa dari array $data
    $idPenyewa = $data['idPenyewa'];
    $namaPenyewa = $data['namaPenyewa'];
    $nomorTelepon = $data['nomorTelepon'];
    $alamat = $data['alamat'];

    // Mengecek apakah no telepon sudah ada
    $queryCekNoTelepon = "SELECT * FROM penyewa WHERE no_telepon = '$nomorTelepon' AND id_penyewa != '$idPenyewa'";
    $resultCekNoTelepon = mysqli_query($connection, $queryCekNoTelepon);
    if (mysqli_num_rows($resultCekNoTelepon) > 0) {
        // Jika no telepon sudah ada, kembalikan pesan error        
        $existingNoTelepon = mysqli_fetch_assoc($resultCekNoTelepon);
        return $existingNoTelepon['no_telepon'];
    } else {
        // Jika no telepon belum ada, simpan data penyewa ke database
        $queryUpdatePenyewa = "UPDATE penyewa SET nama_penyewa = '$namaPenyewa', no_telepon = '$nomorTelepon', alamat = '$alamat' WHERE id_penyewa = '$idPenyewa'";
        $resultUpdatePenyewa = mysqli_query($connection, $queryUpdatePenyewa);

        // Kembalikan pesan sukses
        if ($resultUpdatePenyewa) {
            return 'success';
        } else {
            return 'error';
        }
    }
}

// Function penyewaDelete untuk menghapus data penyewa
function penyewaDelete($idPenyewa) {
    global $connection;

    $queryDeletePenyewa = "DELETE FROM penyewa WHERE id_penyewa = '$idPenyewa'";
    $resultDeletePenyewa = mysqli_query($connection, $queryDeletePenyewa);

    if ($resultDeletePenyewa) {
        return 'success';
    } else {
        return 'error';
    }
}

// Function getSewaData untuk mengambil data sewa berdasarkan id penyewa
function getSewaData($connection) {
    $query = "SELECT
              sewa.id_sewa,
              sewa.tanggal_sewa,
              sewa.nama_karyawan,
              sewa.lama_sewa,
              sewa.harga_sewa,
              motor.merk,
              penyewa.nama_penyewa
              FROM sewa
              JOIN motor ON sewa.motor_id = motor.id_motor
              JOIN penyewa ON sewa.penyewa_id = penyewa.id_penyewa";
              
    return mysqli_query($connection, $query);
}

// Function getMotorData untuk mengambil data sepeda motor
function getMotorData($connection) {
    $query = "SELECT id_motor, merk FROM motor";
    return mysqli_query($connection, $query);
}

// Function getPenyewaData untuk mengambil data penyewa
function getPenyewaData($connection) {
    $query = "SELECT id_penyewa, nama_penyewa FROM penyewa";
    return mysqli_query($connection, $query);
}

// Function sewaCreate untuk membuat data sewa
function sewaCreate($data) {
    global $connection;

    // Mengambil data sewa dari array $data
    $tanggalSewa = $data['tanggalSewa'];
    $merkMotor = $data['merkMotor'];
    $namaPenyewa = $data['namaPenyewa'];
    $namaKaryawan = $data['namaKaryawan'];
    $lamaSewa = $data['lamaSewa'];
    $hargaSewa = $data['hargaSewa'];

    // Menyimpan data sewa ke database
    $queryCreateSewa = "INSERT INTO sewa (tanggal_sewa, motor_id, penyewa_id, nama_karyawan, lama_sewa, harga_sewa) VALUES ('$tanggalSewa', '$merkMotor', '$namaPenyewa', '$namaKaryawan', '$lamaSewa', '$hargaSewa')";
    $resultCreateSewa = mysqli_query($connection, $queryCreateSewa);

    if ($resultCreateSewa) {
        return 'success';
    } else {
        return 'error';
    }
}

// Function getSewaDetail untuk mengambil data detail sewa berdasarkan id sewa
function getSewaDetail($idSewa) {
    global $connection;

    $queryGetSewaDetail = "SELECT s.*, m.no_polisi, m.merk, m.kategori, p.nama_penyewa, p.no_telepon, p.alamat
                        FROM sewa s
                        JOIN motor m ON s.motor_id = m.id_motor
                        JOIN penyewa p ON s.penyewa_id = p.id_penyewa
                        WHERE s.id_sewa = $idSewa";
    return mysqli_query($connection, $queryGetSewaDetail);
}

// Function sewaUpdate untuk mengupdate data sewa
function sewaUpdate($data) {
    global $connection;

    // Mengambil data sewa dari array $data
    $idSewa = $data['idSewa'];
    $tanggalSewa = $data['tanggalSewa'];
    $merkMotor = $data['merkMotor'];
    $namaPenyewa = $data['namaPenyewa'];
    $namaKaryawan = $data['namaKaryawan'];
    $lamaSewa = $data['lamaSewa'];
    $hargaSewa = $data['hargaSewa'];

    // Menyiapkan query untuk memperbarui data sewa
    $querySewaUpdate = "UPDATE sewa SET tanggal_sewa = '$tanggalSewa', motor_id = '$merkMotor', penyewa_id = '$namaPenyewa', nama_karyawan = '$namaKaryawan', lama_sewa = '$lamaSewa', harga_sewa = '$hargaSewa' WHERE id_sewa = '$idSewa'";
    $resultSewaUpdate = mysqli_query($connection, $querySewaUpdate);

    if ($resultSewaUpdate) {
        return 'success';
    } else {
        return 'error';
    }
}

// Function sewaDelete untuk menghapus data sewa
function sewaDelete($idSewa) {
    global $connection;

    $querySewaDelete = "DELETE FROM sewa WHERE id_sewa = '$idSewa'";
    $resultSewaDelete = mysqli_query($connection, $querySewaDelete);

    if ($resultSewaDelete) {
        return 'success';
    } else {
        return 'error';
    }
}

// Function getTotalSewa untuk menghitung total sewa
function getTotalSewa() {
    global $connection;

    // Query sql untuk mendapatkan total sewa
    $queryGetTotalSewa = "SELECT COUNT(*) as total_sewa FROM sewa";
    $resultGetTotalSewa = mysqli_query($connection, $queryGetTotalSewa);

    if ($resultGetTotalSewa) {
        $data = mysqli_fetch_assoc($resultGetTotalSewa);
        return $data['total_sewa'];
    } else {
        die("Error: " . mysqli_error($connection));
    }
}

// Function getTotalPenyewa untuk menghitung total penyewa
function getTotalPenyewa() {
    global $connection;

    // Query sql untuk mendapatkan total penyewa
    $queryGetTotalPenyewa = "SELECT COUNT(*) as total_penyewa FROM penyewa";
    $resultGetTotalPenyewa = mysqli_query($connection, $queryGetTotalPenyewa);

    if ($resultGetTotalPenyewa) {
        $data = mysqli_fetch_assoc($resultGetTotalPenyewa);
        return $data['total_penyewa'];
    } else {
        die("Error: " . mysqli_error($connection));
    }
}
?>