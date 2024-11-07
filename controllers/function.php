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
?>