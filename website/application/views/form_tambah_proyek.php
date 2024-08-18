<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek</title>
</head>
<body>
    <h1>Tambah Proyek Baru</h1>
    <form action="<?= site_url('welcome/proses_tambah_proyek'); ?>" method="post">
        <label for="nama">Nama Proyek:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="lokasi_id">ID Lokasi:</label>
        <input type="text" id="lokasi_id" name="lokasi_id" required><br><br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>

        <label for="tanggal_mulai">Tanggal Mulai:</label>
        <input type="date" id="tanggal_mulai" name="tanggal_mulai" required><br><br>

        <label for="tanggal_selesai">Tanggal Selesai:</label>
        <input type="date" id="tanggal_selesai" name="tanggal_selesai" required><br><br>

        <button type="submit">Tambah Proyek</button>
    </form>
</body>
</html>
