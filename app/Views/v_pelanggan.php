<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding untuk memastikan teks ditampilkan dengan benar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan responsif agar halaman dapat menyesuaikan ukuran layar perangkat -->
    <title>Daftar Pelanggan</title> <!-- Menentukan judul halaman -->
    <!-- Menghubungkan ke stylesheet Bootstrap untuk styling dan desain -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Menghubungkan ke font-awesome untuk ikon tambahan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container mt-5"> <!-- Kontainer utama dengan margin atas 5 untuk tata letak halaman -->
        <h1 class="text-center">Daftar Pelanggan</h1> <!-- Judul halaman yang ditampilkan di tengah -->

        <!-- Tombol untuk membuka modal tambah data pelanggan -->
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="fas fa-cart-plus me-2"></i>Tambah Data <!-- Tombol dengan ikon untuk menambah data pelanggan -->
            </button>
        </div>

        <!-- Modal untuk form tambah data pelanggan -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Data Pelanggan</h5> <!-- Judul modal -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk menambah data pelanggan -->
                        <form action="/pelanggan/store" method="POST">
                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama</label> <!-- Label untuk input nama pelanggan -->
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required> <!-- Input nama pelanggan -->
                            </div>
                            <div class="mb-3">
                                <label for="alamat_pelanggan" class="form-label">Alamat</label> <!-- Label untuk input alamat pelanggan -->
                                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" required> <!-- Input alamat pelanggan -->
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No Telepon</label> <!-- Label untuk input nomor telepon pelanggan -->
                                <input type="text" class="form-control" id="no_telp" name="no_telp" required> <!-- Input nomor telepon pelanggan -->
                            </div>
                            <div class="modal-footer">
                                <!-- Tombol untuk menutup modal tanpa menyimpan data -->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <!-- Tombol untuk mengirim data form -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel untuk menampilkan daftar pelanggan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Nama</th> 
                    <th>Alamat</th> 
                    <th>No Telepon</th> 
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data pelanggan jika ada -->
                <?php if (!empty($pelanggan)) : ?>
                    <?php foreach ($pelanggan as $row) : ?>
                        <tr>
                            <td><?= $row['id_pelanggan'] ?></td> <!-- Menampilkan ID pelanggan -->
                            <td><?= $row['nama_pelanggan'] ?></td> <!-- Menampilkan nama pelanggan -->
                            <td><?= $row['alamat_pelanggan'] ?></td> <!-- Menampilkan alamat pelanggan -->
                            <td><?= $row['no_telp'] ?></td> <!-- Menampilkan nomor telepon pelanggan -->
                            <td>
                                <!-- Tombol Edit untuk mengubah data pelanggan -->
                                <a href="/pelanggan/edit/<?= $row['id_pelanggan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <!-- Tombol Hapus untuk menghapus data pelanggan dengan konfirmasi -->
                                <a href="/pelanggan/delete/<?= $row['id_pelanggan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <!-- Menampilkan pesan jika tidak ada data pelanggan -->
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data pelanggan</td> <!-- Pesan ketika tidak ada data pelanggan -->
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
