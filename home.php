<?php
include('./controllers/function.php');

// Mendapatkan total sewa
$totalSewa = getTotalSewa();

// Mendapatkan total penyewa
$totalPenyewa = getTotalPenyewa();
?>

<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Dashboard Header -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:credit-card" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= $totalSewa; ?>
                                </h4>
                                <p class="card-subtitle">Total Sewa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:motorbike" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">

                                </h4>
                                <p class="card-subtitle">Motor Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:users" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= $totalPenyewa; ?>
                                </h4>
                                <p class="card-subtitle">Total Penyewa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:clock" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">

                                </h4>
                                <p class="card-subtitle">Sewa Hari Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Body Wrapper -->