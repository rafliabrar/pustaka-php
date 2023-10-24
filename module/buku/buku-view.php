<div class='card'>
    <div class='card-header'>
        <h3>Data buku</h3>
    </div>
    <div class='card-body'>
    <!-- tombol tmbh siswa -->
    <!-- Button trigger modal -->
    <?php
    if (!empty($_SESSION['alert']))  :
      echo $_SESSION['alert'];
    endif;
    unset($_SESSION['alert']);
      ?>
<button type="button" class="btn btn-primary px-3 mb-3" data-bs-toggle="modal" data-bs-target="#bukuModal">
  Tambah data buku
</button>
    <!-- bagian table -->
    <table class="table table-bordered">
    <thead>
      <tr>
      <th>No.</th>
        <th>ISBN</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun terbit</th>
        <th>Jenis Buku</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
       
    </thead>
    <tbody>
        <?php
//queryyy Select data siswa
$no = 1;
$query = "SELECT * FROM muda_buku";
$conn = mysqli_query ($connection, $query);
while ($data = mysqli_fetch_array($conn)) {
        ?>
<!-- fecth data siswa -->

    <tr>
    <td><?= $no++ ?></td>
    <td><?= $data['isbn']; ?></td>
    <td><?= $data['judul_buku']; ?></td>
    <td><?= $data['pengarang']; ?></td>
    <td><?= $data['penerbit']; ?></td>
    <td><?= $data['tahun_terbit']; ?></td>
    <td><?= $data['jenis_buku']; ?></td>
    <td><?= $data['stok']; ?></td>
    <td>
    <a href="?module=edit-buku&id=<?= $data['isbn']; ?>" class="btn btn-warning">Edit</a>
    <a href="module/buku/aksi.php?module=buku&act=delete&id=<?= $data['isbn']; ?>" onclick="return confirm ('Yakin Ingin Menghapus Data? <?= $data['judul_buku']; ?>') " class="btn btn-danger">HAPUS</a>

    </td>
</tr>
 <?php } ?>



    </tbody>
    </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="module/buku/aksi.php?module=buku&act=insert" method="post">
            <!-- form input data siswa -->
            <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_buku" class="form-label">Jenis Buku</label>
                <select type="text" name="jenis_buku" class="form-select" required>
                <option value="">-Pilih Jenis buku-</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Novel">Novel</option>
                <option value="Majalah">Majalah</option>
                <option value="Komik">Komik</option>
                <option value="Religi">Religi</option>
                <option value="Biografi">Biografi</option>
                <option value="Naskah">Naskah</option>
            </select>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" name="stok" class="form-control" >
            
            
</input>
            
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal hapus siswa -->
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="=sbumit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>