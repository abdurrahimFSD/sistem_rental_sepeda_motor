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
            return 'successMotorCreate';
        } else {
            return 'errorMotorCreate';
        }
    }
}
?>