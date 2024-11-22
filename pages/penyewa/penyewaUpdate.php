<?php
include('./config/connection.php');

// Mendapatkan idPenyewa
if (isset($_GET['id_penyewa'])) {
    $idPenyewa = $_GET['id_penyewa'];

    $queryPenyewa = "SELECT * FROM penyewa WHERE id_penyewa = '$idPenyewa'";
    $resultPenyewa = mysqli_query($connection, $queryPenyewa);
    $penyewaData = mysqli_fetch_assoc($resultPenyewa);

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
                        <h4 class="mb-4 mb-sm-0 card-title">Edit Data Penyewa</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary-emphasis"> Edit Penyewa </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="widget-content searchable-container list">

            <!-- Start Card body main content -->
            <div class="card card-body">
                <h4 class="card-title">Masukkan Data Penyewa</h4>
                <hr class="mb-4">
                <form id="penyewaUpdateForm">
                    <input type="hidden" name="idPenyewa" value="<?= $penyewaData['id_penyewa']; ?>">
                    <div class="mb-3">
                        <label for="namaPenyewa" class="form-label">Nama Penyewa</label>
                        <input type="text" class="form-control" name="namaPenyewa" id="namaPenyewa" value="<?= $penyewaData['nama_penyewa']; ?>" placeholder="Erling Haaland" required>
                    </div>
                    <div class="mb-3">  
                        <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="nomorTelepon" id="nomorTelepon" value="<?= $penyewaData['no_telepon']; ?>" placeholder="081311112222" required> 
                    </div>
                    <div class="mb-3">  
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $penyewaData['alamat']; ?>" placeholder="Norway" required> 
                    </div>
                    <a href="?page=penyewaData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-muted me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                    <input type="hidden" name="simpan" value="penyewaUpdate">
                    <button type="submit" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                        <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Simpan
                    </button>
                </form>
            </div>
            <!-- ENd Card body main content -->
        </div>
    </div>
    
</div>
<!-- End Body Wrapper -->