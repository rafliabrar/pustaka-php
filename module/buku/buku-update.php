<?php include "config/koneksi.php";
$isbn = $_GET['id'];
$query = "SELECT * FROM muda_buku WHERE isbn = $isbn";
$conn = mysqli_query($connection, $query);
$data = mysqli_fetch_array($conn);
?>
<div class='card-header'>
    <h1>Edit Data Buku</h1>
</div>
<div class='card-body'>
    <p>Edit Data Buku7</p>
    <form action="module/buku/aksi.php?module=buku&act=update" method="post">
        <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="<?= $data['isbn']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" value="<?= $data['judul_buku']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value= "<?=$data['pengarang']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value= "<?= $data['penerbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control" value= "<?= $data['tahun_terbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis_buku" class="form-label">Jenis Buku</label>
                <select type="text" name="jenis_buku" class="form-select" required>
                <option value="<?= $data['jenis_buku']; ?>"selected><?= $data['jenis_buku']; ?></option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Novel">Novel</option>
                <option value="Majalah">Majalah</option>
                <option value="Komik">Komik</option>
                <option value="Religi">Religi</option>
                <option value="Biografi">Biografi</option>
                <option value="Naskah">Naskah</option>
            </select>
            <div class="mb-3">
                <label for="jenis_buku" class="form-label">Stok</label>
                <input type="text" name="stok" class="form-control" <?= $data['stok']; ?> >
            </div>
        <div class="mb-3">
            
            <a href="?module=siswa" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
</div>
</div>