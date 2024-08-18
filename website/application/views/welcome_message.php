<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .buttons {
            margin-bottom: 20px;
        }
        .buttons a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Daftar Lokasi</h1>
    <div class="buttons">
        <a href="<?php echo site_url('welcome/tambah_lokasi'); ?>">Tambah Lokasi</a>
        <a href="<?php echo site_url('welcome/tambah_proyek'); ?>">Tambah Proyek</a>
    </div>
    <table>
        <tr>
            <th>Nama Lokasi</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>
        <?php if (isset($lokasi) && is_array($lokasi) && !empty($lokasi)): ?>
            <?php foreach ($lokasi as $l): ?>
                <tr>
                    <td><?php echo htmlspecialchars($l['namaLokasi']); ?></td>
                    <td><?php echo htmlspecialchars($l['negara']); ?></td>
                    <td><?php echo htmlspecialchars($l['provinsi']); ?></td>
                    <td><?php echo htmlspecialchars($l['kota']); ?></td>
                    <td>
                        <a href="<?php echo site_url('welcome/edit_lokasi/'.$l['id']); ?>">Edit</a> |
                        <a href="<?php echo site_url('welcome/hapus_lokasi/'.$l['id']); ?>" onclick="return confirm('Yakin ingin menghapus lokasi ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Data lokasi tidak tersedia atau format tidak sesuai.</td></tr>
        <?php endif; ?>
    </table>

    <h1>Daftar Proyek</h1>
    <table>
        <tr>
            <th>Nama Proyek</th>
            <th>Deskripsi</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
        <?php if (isset($proyek) && is_array($proyek) && !empty($proyek)): ?>
            <?php foreach ($proyek as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['namaProyek']); ?></td>
                    <td><?php echo isset($p['deskripsi']) && is_string($p['deskripsi']) ? htmlspecialchars($p['deskripsi']) : 'No description available'; ?></td>
                    <td><?php echo isset($p['lokasi']) && is_string($p['lokasi']) ? htmlspecialchars($p['lokasi']) : 'No location available'; ?></td>
                    <td>
                        <a href="<?php echo site_url('welcome/edit_proyek/'.$p['id']); ?>">Edit</a> |
                        <a href="<?php echo site_url('welcome/hapus_proyek/'.$p['id']); ?>" onclick="return confirm('Yakin ingin menghapus proyek ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Data proyek tidak tersedia atau format tidak sesuai.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
