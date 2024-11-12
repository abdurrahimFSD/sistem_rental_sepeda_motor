// Kode alert untuk operasi tambah data baru
if (document.getElementById('sepedaMotorCreateForm')) {
    document.getElementById('sepedaMotorCreateForm').addEventListener('submit', function(event) {
        // Mencegah form submit secara default (refresh halaman) atau Mencegah form dari submit secara langsung
        event.preventDefault();

        const form = document.getElementById('sepedaMotorCreateForm');
        const formData = new FormData(form);
        console.log(formData);

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
}