<?php
include('./controllers/function.php');

// Ambil data motor dari function
$resultMotor = getMotorData($connection);

// Ambil data penyewa dari function
$resultPenyewa = getPenyewaData($connection);

// Ambil ID sewa dari query string
if (isset($_GET['id_sewa'])) {
    $idSewa = $_GET['id_sewa'];

    $query = "SELECT * FROM sewa WHERE id_sewa = '$idSewa'";
    $result = mysqli_query($connection, $query);
    $dataSewa = mysqli_fetch_assoc($result);
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
                        <h4 class="mb-4 mb-sm-0 card-title">Edit Data Sewa</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary-emphasis"> Edit Sewa </span>
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
                <h4 class="card-title">Masukkan Data Sewa</h4>
                <hr class="mb-4">
                <form id="sewaUpdateForm">
                    <input type="hidden" name="idSewa" value="<?= $dataSewa['id_sewa'] ?>">
                    <div class="mb-3">
                        <label for="tanggalSewa" class="form-label">Tanggal sewa</label>
                        <input type="date" class="form-control" name="tanggalSewa" id="tanggalSewa" value="<?= $dataSewa['tanggal_sewa']; ?>" onfocus="this.showPicker()" required>
                    </div>
                    <div class="mb-3">  
                        <label for="merkMotor" class="form-label">Merk Motor</label>
                        <select name="merkMotor" id="merkMotor" class="form-select" required>
                            <option value="" selected disabled>Pilih Merk Motor</option>
                            <?php while($motorData = mysqli_fetch_assoc($resultMotor)) { ?>
                                <option value="<?= $motorData['id_motor'] ?>" <?= $motorData['id_motor'] == $dataSewa['motor_id'] ? 'selected' : ''; ?> >
                                    <?= $motorData['merk'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">  
                        <label for="namaPenyewa" class="form-label">Nama Penyewa</label>
                        <select name="namaPenyewa" id="namaPenyewa" class="form-select" required>
                            <option value="" selected disabled>Pilih Nama Penyewa</option>
                            <?php while($namaPenyewaData = mysqli_fetch_assoc($resultPenyewa)) { ?>
                                <option value="<?= $namaPenyewaData['id_penyewa'] ?>" <?= $namaPenyewaData['id_penyewa'] == $dataSewa['penyewa_id'] ? 'selected' : ''; ?> >
                                    <?= $namaPenyewaData['nama_penyewa'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">  
                        <label for="namaKaryawan" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" name="namaKaryawan" id="namaKaryawan" value="<?= $dataSewa['nama_karyawan']; ?>" placeholder="Kovacic" required>
                    </div>
                    <div class="mb-3">  
                        <label for="lamaSewa" class="form-label">Lama Sewa</label>
                        <input type="text" class="form-control" name="lamaSewa" id="lamaSewa" value="<?= $dataSewa['lama_sewa']; ?>" placeholder="7 Hari" required>
                    </div>
                    <div class="mb-3">  
                        <label for="hargaSewa" class="form-label">Harga Sewa</label>
                        <input type="text" class="form-control" name="hargaSewa" id="hargaSewa" value="<?= $dataSewa['harga_sewa']; ?>" placeholder="250000" required>
                    </div>
                    <a href="?page=sewaData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-muted me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                    <input type="hidden" name="simpan" value="sewaUpdate">
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