<?php
include "../../config/koneksi.php"; //include file koneksi
date_default_timezone_set('Asia/Jakarta');


//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

//bagian insert data
if ($module == 'pinjam' and $act == 'insert') :
    //inisialisasi nama field le dalam variabel
    $isbn = $_POST['isbn'];
    $nisn = $_POST['nisn'];
    $kembali = $_POST['tanggal_kembali'];
    $id = date('dmyHis');
    $pinjam = date('Y-m-d');
    $status = 'pinjam';

    // query ambil data stock
    $query = "SELECT isbn, stok FROM muda_buku WHERE isbn = $isbn"; 
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    // masukkan jumlah stok variabel
    $stok = $row['stok'];
    // lakukkan pengurangan stok (-1)
    $newStok = $stok -1;
    
    

    //query insert peminjaman
    $query_pinjam = "INSERT INTO muda_peminjaman (id_peminjaman, nisn, isbn, tanggal_pinjam, tanggal_kembali, status) VALUE ('$id','$nisn','$isbn','$pinjam','$kembali','$status')";

    //kondisi pengecekan apakah data berhasil dimasukan atau tidak
    if ($connection->query($query_pinjam)) {

        // query update Stok buku
        $query_stok = "UPDATE muda_buku SET
                       stok = $newStok
                       WHERE isbn = '$isbn'";

        //munculkan alert sukses simpan data
        session_start();
        $_SESSION["alert"] = "
        <div class = 'alert alert-success' role='alert'>
        Data Siswa Berhasil Di Simpan.
        </div>
        ";

        //  jalankan query update stok
        $connection->query($query_stok);

        //redirect ke halaman awal
        header("location:../../media.php?module=" . $module);
    } else {

        //pesan error gagal insert data
        echo "data gagal disimpan!!";
    }
    
   //bagian hapus data peminjaman
    elseif  ($module == 'pinjam' and $act == 'delete') :

   // ambil id peminjaman
   $id = $_GET('id');
   // ambil isbn
   $isbn = $_GET('isbn');

    // query ambil data stock
    $query = "SELECT isbn, stok FROM muda_buku WHERE isbn = $isbn"; 
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    // masukkan jumlah stok variabel
    $stok = $row['stok']; 
    // lakukkan pengurangan stok (+1)
    $newStok = $stok + 1;

   // query delete pemnjaman
   $query_pinjam = "DELETE FROM muda_peminjaman = $id";

   // query update stok
   $query_stok = "UPDATE ";

endif;