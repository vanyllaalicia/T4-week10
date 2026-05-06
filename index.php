<?php include 'config/database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
<div class="container mt-5">
    <h2 class="text-center mb-4">📚 Data Buku</h2>

    <div class="d-flex justify-content-between mb-3">
        <a href="create.php" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM buku");
                while ($d = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['judul'] ?></td>
                    <td><?= $d['pengarang'] ?></td>
                    <td><?= $d['penerbit'] ?></td>
                    <td><?= $d['tahun_terbit'] ?></td>
                    <td><?= $d['stok'] ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>