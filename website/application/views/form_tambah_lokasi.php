<h2>Tambah Lokasi</h2>
<form method="post" action="<?php echo site_url('tambah-lokasi'); ?>">
    <label for="namaLokasi">Nama Lokasi:</label>
    <input type="text" name="namaLokasi" required><br>

    <label for="negara">Negara:</label>
    <input type="text" name="negara" required><br>

    <label for="provinsi">Provinsi:</label>
    <input type="text" name="provinsi" required><br>

    <label for="kota">Kota:</label>
    <input type="text" name="kota" required><br>

    <input type="submit" value="Tambah Lokasi">
</form>
