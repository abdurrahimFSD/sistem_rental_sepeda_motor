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
?>