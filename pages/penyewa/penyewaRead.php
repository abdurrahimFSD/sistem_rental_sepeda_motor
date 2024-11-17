<?php
include('./controllers/function.php');

$no = 1;
// Memanggil function fetchData dengan argumen motor
$penyewaData = fetchData('penyewa');
?>

<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Data Penyewa</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary-emphasis"> Data Penyewa </span>
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
                <div class="d-flex justify-content-end mb-9">
                    <a href="?page=penyewaCreate" class="btn btn-primary d-flex align-items-center">
                        <iconify-icon icon="fluent:add-24-filled" class="text-white me-1 fs-5 d-inline-flex align-items-center"></iconify-icon> Tambah Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="dataTables" class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach($penyewaData as $row) { ?>
                            <!-- start row -->
                            <tr class="search-items">
                                <td class="text-dark">
                                    <?= $no++; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['nama_penyewa']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['no_telepon']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['alamat']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="action-btn">
                                        <a href="?page=penyewaUpdate&id_penyewa=<?= $row['id_penyewa']; ?>" class="d-inline-flex btn btn-sm btn-outline-warning edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <iconify-icon icon="tabler:edit" class="fs-5"></iconify-icon>
                                        </a>
                                        <a href="#" id="deleteButtonPenyewa" onclick="confirmDelete('<?= $row['id_penyewa']; ?>')" class="d-inline-flex btn btn-sm btn-outline-danger delete ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- end row -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ENd Card body main content -->
        </div>
    </div>
    
</div>
<!-- End Body Wrapper -->