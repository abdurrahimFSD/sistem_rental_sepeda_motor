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
        $queryCreatePenyewa = "INSERT INTO penyewa (nama, no_telepon, alamat) VALUES ('$namaPenyewa', '$nomorTelepon', '$alamat')";
        $resultCreatePenyewa = mysqli_query($connection, $queryCreatePenyewa);

        // Kembalikan pesan sukses
        if ($resultCreatePenyewa) {
            return 'success';
        } else {
            return 'error';
        }
    }
}
?>