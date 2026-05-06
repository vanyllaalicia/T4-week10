<?php include 'config/database.php'; ?>

<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE buku SET
        judul='$_POST[judul]',
        pengarang='$_POST[pengarang]',
        penerbit='$_POST[penerbit]',
        tahun_terbit='$_POST[tahun]',
        stok='$_POST[stok]'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4">Edit Buku</h3>

            <form method="post">
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" value="<?= $d['judul'] ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Pengarang</label>
                    <input type="text" name="pengarang" value="<?= $d['pengarang'] ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" value="<?= $d['penerbit'] ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tahun</label>
                    <input type="number" name="tahun" value="<?= $d['tahun_terbit'] ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" value="<?= $d['stok'] ?>" class="form-control">
                </div>

                <button class="btn btn-warning" name="update">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>