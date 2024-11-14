<?php

include('./function.php');

// Mengecek apakah form telah disubmit
if (isset($_POST['simpan'])) {

    // Jika tombol simpan adalah sepedaMotorCreate
    if ($_POST['simpan'] == 'sepedaMotorCreate') {
        // Memanggil function motorCreate
        $result = motorCreate($_POST);

        // Jika proses berhasil
        if ($result == 'success') {
            echo 'successMotorCreate';
        } elseif ($result == 'error') {
            echo 'errorMotorCreate';
        } elseif (is_string($result)) {
            echo 'duplicateNoPolisi:' . $result;
        }
    } elseif ($_POST['simpan'] == 'sepedaMotorUpdate') {
        // Memanggil function motorUpdate
        $result = motorUpdate($_POST);

        // Jika proses berhasil
        if ($result == 'success') {
            echo 'successMotorUpdate';
        } elseif ($result == 'error') {
            echo 'errorMotorUpdate';
        } elseif (is_string($result)) {
            echo 'duplicateNoPolisi:' . $result;
        }
    }
}
?>