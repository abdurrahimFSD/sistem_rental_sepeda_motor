<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Tambah Data Sepeda Motor</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary-emphasis"> Tambah Sepeda Motor </span>
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
                <h4 class="card-title">Masukkan Data Sepeda Motor</h4>
                <hr class="mb-4">
                <form id="sepedaMotorCreateForm">
                    <div class="mb-3">
                        <label for="noPolisi" class="form-label">No Polisi</label>
                        <input type="text" class="form-control" name="noPolisi" id="noPolisi" placeholder="DA2020AD" required>
                    </div>
                    <div class="mb-3">  
                        <label for="merk" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="merk" id="merk" placeholder="Scoopy" required>
                    </div>
                    <div class="mb-4">
                        <label for="kategori" class="form-label">kategori</label>
                        <?php
                            include('./config/connection.php');
                            $kategori = ['Matic', 'Non Matic'];
                        ?>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option selected disabled>Pilih kategori</option>
                            <?php foreach($kategori as $kategoriData) { ?>
                                <option value="<?= $kategoriData; ?>"><?= $kategoriData; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <a href="?page=sepedaMotorData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-muted me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                    <input type="hidden" name="simpan" value="sepedaMotorCreate">
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