<?php include "config/koneksi.php";
$nisn = $_GET['id'];
$query = "SELECT * FROM muda_siswa WHERE nisn = $nisn";
$conn = mysqli_query($connection, $query);
$data = mysqli_fetch_array($conn);
?>
<div class='card-header'>
    <h1>Edit Data Siswa</h1>
</div>
<div class='card-body'>
    <p>Edit Data Siswa</p>
    <form action="module/siswa/aksi.php?module=siswa&act=update" method="post">
        <div class="mb-3">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" value="<?= $data['nisn']; ?>" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="nama">Nama Siswa</label>
            <input type="text" name="nama_siswa" value="<?= $data['nama_siswa']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" class="form-select">
                <option value="<?= $data['jurusan']; ?>" selected><?= $data['jurusan']; ?></option>
                <option value="">-Pilih Jurusan-</option>
                <option value="PPLG">PPLG</option>
                <option value="TJKT">TJKT</option>
                <option value="DKV">DKV</option>
                <option value="AKL">AKL</option>
                <option value="MPLB">MPLB</option>
                <option value="PM">Pemasaran</option>
            <select>
        </div>
        <div class="mb-3">
            <label for="jekel" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
                <!-- Cek jenis kelamin -->
                <?php if ($data['jenis_kelamin'] == 'L') : ?>
                    <option value="L" selected>Laki-laki</option>
                    <option value="P">Perempuan</option>
                <?php else : ?>
                    <option value="L">Laki-laki</option>
                    <option value="P" selected>Perempuan</option>
                <?php endif; ?>
            </select>  
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No Hp</label>
            <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" rows="3" class="form-control"><?= $data['alamat']; ?></textarea>
        </div>
        <div class="mb-3">
            <a href="?module=siswa" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
</div>
</div>