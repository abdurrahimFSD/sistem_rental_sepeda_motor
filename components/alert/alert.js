// Kode alert untuk operasi tambah data baru
if (document.getElementById('sepedaMotorCreateForm')) {
    document.getElementById('sepedaMotorCreateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();

        const form = document.getElementById('sepedaMotorCreateForm');
        const formData = new FormData(form);

        // Mengirim form melalui AJAX
        fetch('./controllers/process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(response => {
            if (response == 'successMotorCreate') {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data motor baru berhasil ditambahkan',
                    icon: 'success',
                }).then(() => {
                    window.location.href = './index.php?page=sepedaMotorData';
                });
            } else if (response == 'errorMotorCreate') {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data motor baru gagal ditambahkan',
                    icon: 'error',
                });
            } else if (response.startsWith('duplicateNoPolisi:')) {
                const existingNoPolisi = response.split(':')[1];
                Swal.fire({
                    title: 'Gagal',
                    text: `No Polisi ${existingNoPolisi} sudah ada`,
                    icon: 'warning',
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Gagal',
                text: 'Terjadi kesalahan saat menambahkan data motor',
                icon: 'error',
            });
        }) 
    })
} else if(document.getElementById('penyewaCreateForm')) {
    document.getElementById('penyewaCreateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();

        const form = document.getElementById('penyewaCreateForm');
        const formData = new FormData(form);

        // Mengirim form melalui AJAX
        fetch('./controllers/process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(response => {
            if (response == 'successPenyewaCreate') {
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data penyewa baru berhasil ditambahkan',
                    icon: 'success',
                }).then(() => {
                    window.location.href = './index.php?page=penyewaData';
                });
            } else if (response == 'errorPenyewaCreate') {
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data penyewa baru gagal ditambahkan',
                    icon: 'error',
                });
            } else if (response.startsWith('duplicateNoTelepon:')) {
                const existingNoTelepon = response.split(':')[1];
                Swal.fire({
                    title: 'Gagal',
                    text: `No telepon ${existingNoTelepon} sudah ada`,
                    icon: 'warning',
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Gagal',
                text: 'Terjadi kesalahan saat menambahkan data penyewa',
                icon: 'error',
            });
        })
    })
}   

// Kode alert untuk operasi edit data 
if (document.getElementById('sepedaMotorUpdateForm')) {
    document.getElementById('sepedaMotorUpdateForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Apakah anda ingin menyimpan perubahan ini?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('sepedaMotorUpdateForm');
                const formData = new FormData(form);

                fetch('./controllers/process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response === 'successMotorUpdate') {
                        Swal.fire('Tersimpan', '', 'success').then(() => {
                            window.location.href = './index.php?page=sepedaMotorData';
                        });
                    } else if (response === 'errorMotorUpdate') {
                        Swal.fire('Gagal', '', 'error');
                    } else if (response.startsWith('duplicateNoPolisi:')) {
                        const existingNoPolisi = response.split(':')[1];
                        Swal.fire({
                            title: 'Gagal',
                            text: `No Polisi ${existingNoPolisi} sudah ada, tidak boleh sama`,
                            icon: 'warning',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi kesalahan saat menyimpan perubahan', 'error');
                }) 
            } else if (result.isDismissed) {
                Swal.fire('Perubahan dibatalkan', '', 'info');
            }
        })
    })
} else if (document.getElementById('penyewaUpdateForm')) {
    document.getElementById('penyewaUpdateForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Apakah anda ingin menyimpan perubahan ini?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('penyewaUpdateForm');
                const formData = new FormData(form);

                fetch('./controllers/process.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response === 'successPenyewaUpdate') {
                        Swal.fire('Tersimpan', '', 'success').then(() => {
                            window.location.href = './index.php?page=penyewaData';
                        });
                    } else if (response === 'errorPenyewaUpdate') {
                        Swal.fire('Gagal', '', 'error');
                    } else if (response.startsWith('duplicateNoTelepon:')) {
                        const existingNoTelepon = response.split(':')[1];
                        Swal.fire({
                            title: 'Gagal',
                            text: `No Telepon ${existingNoTelepon} sudah ada, tidak boleh sama`,
                            icon: 'warning',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi kesalahan saat menyimpan perubahan', 'error');
                }) 
            } else if (result.isDismissed) {
                Swal.fire('Perubahan dibatalkan', '', 'info');
            }
        })
    })
}

// Kode alert untuk operasi hapus data 
if (document.getElementById('deleteButtonSepedaMotor')) {
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus',
            text: 'Apakah anda yakin menghapus data ini',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`./controllers/process.php?id_motor=${id}`)
                .then(response => response.text())
                .then(response => {
                    if (response === 'successMotorDelete') {
                        Swal.fire('Dihapus', 'Data motor berhasil dihapus', 'success').then(() => {
                            window.location.reload();   // Refresh halaman untuk memperbarui tampilan
                        })
                    } else if (response === 'errorMotorDelete') {
                        Swal.fire('Gagal', 'Data motor gagal dihapus', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi kesalahan', 'error');
                }); 
            }
        })
    }
}else if (document.getElementById('deleteButtonPenyewa')) {
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus',
            text: 'Apakah anda yakin menghapus data ini',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`./controllers/process.php?id_penyewa=${id}`)
                .then(response => response.text())
                .then(response => {
                    if (response === 'successPenyewaDelete') {
                        Swal.fire('Dihapus', 'Data penyewa berhasil dihapus', 'success').then(() => {
                            window.location.reload();   // Refresh halaman untuk memperbarui tampilan
                        })
                    } else if (response === 'errorPenyewaDelete') {
                        Swal.fire('Gagal', 'Data penyewa gagal dihapus', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal', 'Terjadi kesalahan', 'error');
                }); 
            }
        })
    }
}