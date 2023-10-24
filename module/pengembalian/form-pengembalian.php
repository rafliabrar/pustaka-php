<div class='card'>
    <div class='card-header'>
        <h3>Form Pengembalian Buku</h3>
    </div>
    <div class='card-body'>
        <!-- munculkan pesan alert -->
        <?php
        if (!empty($_SESSION['alert'])) :
            echo $_SESSION['alert'];
        endif;
        unset($_SESSION['alert']);
        ?>

        <span class="badge text-bg-success mb-2">
            <?php echo date('d-m-Y H:i:s'); //menampilkan tanggal hari ini
            ?>
        </span>

        <!-- get id peminjaman -->
        <?php
        $id = $_GET['id'];

        // select peminjaman berdasarkan id_peminjaman
        $query = "SELECT * FROM muda_peminjaman WHERE id_peminjaman = '$id'";
        $conn = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($conn);
        ?>

        <!-- awal form pengembalian -->
        <form action="" method="post">
            <!-- bagian id_peminjaman -->
            <div class="mb-3 row">
                <label for="idPinjam" class="col-sm-2 col-form-label">Id Peminjaman</label>
                <div class="col-sm-10 col-form-label">
                    : <label for="id" class="fw-bold"><?= $data['id_peminjaman'] ?></label>
                </div>
    </div>


                <div class="mb-3 row">
                    <label for="idPinjam" class="col-sm-2 col-form-label">Id Peminjaman</label>
                    <div class="col-sm-10 col-form-label">
                        : <label for="id" class="fw-bold"><?= $data['id_peminjaman'] ?></label>
                    </div>
    </div>

        </form>
        <!-- akhir form pengembalian -->
    </div>
</div>