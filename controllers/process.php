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
    } elseif ($_POST['simpan'] == 'penyewaCreate') {
        // Memanggil function penyewaCreate
        $result = penyewaCreate($_POST);

        // Jika proses berhasil
        if ($result == 'success') {
            echo 'successPenyewaCreate';
        } elseif ($result == 'error') {
            echo 'errorPenyewaCreate';
        } elseif (is_string($result)) {
            echo 'duplicateNoTelepon:' . $result;
        }
    } elseif ($_POST['simpan'] == 'penyewaUpdate') {
        // Memanggil function penyewaUpdate
        $result = penyewaUpdate($_POST);

        // Jika proses berhasil
        if ($result == 'success') {
            echo 'successPenyewaUpdate';
        } elseif ($result == 'error') {
            echo 'errorPenyewaUpdate';
        } elseif (is_string($result)) {
            echo 'duplicateNoTelepon:' . $result;
        }
    }
}

// Mengecek apakah parameter 'id_motor' ada di URL
if (isset($_GET['id_motor'])) {
    // Memanggil function motorDelete
    $result = motorDelete($_GET['id_motor']);

    // Jika proses berhasil
    if ($result == 'success') {
        echo 'successMotorDelete';
    } elseif ($result == 'error') {
        echo 'errorMotorDelete';
    }
} elseif (isset($_GET['id_penyewa'])) {
    // Memanggil function penyewaDelete
    $result = penyewaDelete($_GET['id_penyewa']);

    // Jika proses berhasil
    if ($result == 'success') {
        echo 'successPenyewaDelete';
    } elseif ($result == 'error') {
        echo 'errorPenyewaDelete';
    }
}
?>