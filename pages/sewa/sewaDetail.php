<?php
include('./config/connection.php');

// Ambil ID sewa dari query string
$idSewa = isset($_GET['id_sewa']) ? intval($_GET['id_sewa']) : 0;

// Mendapatkan detail sewa dari database
$queryGetSewaDetail = "SELECT s.*, m.no_polisi, m.merk, m.kategori, p.nama_penyewa, p.no_telepon, p.alamat
                        FROM sewa s
                        JOIN motor m ON s.motor_id = m.id_motor
                        JOIN penyewa p ON s.penyewa_id = p.id_penyewa
                        WHERE s.id_sewa = $idSewa";

$resultGetSewaDetail = mysqli_query($connection, $queryGetSewaDetail);

if ($resultGetSewaDetail) {
    $dataSewa = mysqli_fetch_assoc($resultGetSewaDetail);
} else {
    die("Error: " . mysqli_error($connection));
}
?>


<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Detail Sewa</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Detail Sewa </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="card card-body">
            <div class="row">
                <h3>Detail Sewa: <?= htmlspecialchars($dataSewa['nama_penyewa']); ?></h3>
                <hr class="mb-4">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">ID Sewa</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['id_sewa']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Tanggal Sewa</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['tanggal_sewa']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Nama Karyawan</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['nama_karyawan']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Lama Sewa</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['lama_sewa']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Harga Sewa</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['harga_sewa']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Nama Penyewa</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['nama_penyewa']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">No Telepon</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['no_telepon']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Alamat</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['alamat']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">No Polisi</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['no_polisi']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Merk</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['merk']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Kategori</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataSewa['kategori']); ?></p>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="?page=sewaData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>
    
</div>
<!-- End Body Wrapper -->