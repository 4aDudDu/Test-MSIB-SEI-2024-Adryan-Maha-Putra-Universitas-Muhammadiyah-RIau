<h2>Edit Lokasi</h2>
<form method="post" action="<?php echo site_url('edit-lokasi/'.$lokasi['id']); ?>">
    <label for="namaLokasi">Nama Lokasi:</label>
    <input type="text" name="namaLokasi" value="<?php echo $lokasi['namaLokasi']; ?>" required><br>

    <label for="negara">Negara:</label>
    <input type="text" name="negara" value="<?php echo $lokasi['negara']; ?>" required><br>

    <label for="provinsi">Provinsi:</label>
    <input type="text" name="provinsi" value="<?php echo $lokasi['provinsi']; ?>" required><br>

    <label for="kota">Kota:</label>
    <input type="text" name="kota" value="<?php echo $lokasi['kota']; ?>" required><br>

    <input type="submit" value="Update Lokasi">
</form>
