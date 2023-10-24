<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

//bagian insert data
if ($module == 'buku' and $act == 'insert') :
//inisiasi nama field ke dalam variabel
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $jenis = $_POST['jenis_buku'];
    $stok   =$_POST['stok'];

//query insert
    $query = "INSERT INTO muda_buku (isbn,judul_buku,pengarang,penerbit,tahun_terbit,jenis_buku,stok)
                VALUES ('$isbn' , '$judul' , '$penulis' , '$penerbit', '$tahun' , '$jenis' , '$stok')";

//kondisi pengecekan apakah data berhasil dimasukan atau tidak
    if ($connection->query($query)) {

        //munculkan alert sukses simpan data
        session_start();
        $_SESSION["alert"] = "
        <div class = 'alert alert-success' role='alert'>
        Data Siswa Berhasil Di Simpan.
        </div>
        ";

//redirect ke halaman awal
        header("location:../../media.php?module=" . $module);
    } else {

//pesan error gagal insert data
        echo "data gagal disimpan!!";
    }

// bagian hapus data siswa

elseif ($module == 'buku' and $act == 'delete') :

// ambil id siswa
    $isbn = $_GET['id'];

// query delete data
    $query = "DELETE FROM muda_buku WHERE isbn =$id";
//kondisi pengecekan apakah data berhasil dihapus atau tidak
    if ($connection->query($query)) {
//munculkan alert sukses hapus data
        session_start();
        $_SESSION["alert"] = "
        <div class = 'alert alert-success' role='alert'>
        Data Siswa Berhasil Di Hapus.
        </div>
        ";
 //redirect ke halaman awal
        header("location:../../media.php?module=" . $module);
    } else {

//pesan error gagal hapus data
        echo "data gagal disimpan!!";
    }
// bagian aedit data siswa
elseif ($module == 'buku' and $act == 'update') :

//inisialisasi
$isbn = $_POST['isbn'];
$judul = $_POST['judul_buku'];
$penulis = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun_terbit'];
$jenis = $_POST['jenis_buku'];
$stok   =$_POST['stok'];


         // query update data
         $query ="UPDATE muda_buku SET
         isbn = '$isbn',
         judul_buku ='$judul',
         pengarang    ='$penulis',
         penerbit ='$penerbit',
         tahun_terbit = '$tahun',
         jenis_buku = '$jenis',
         stok = '$stok'
         WHERE isbn = $isbn";

         //kondisi pengecekan apakah data berhasil update
    if ($connection->query($query)) {
        //munculkan alert sukses update data
                session_start();
                $_SESSION["alert"] = "
                <div class = 'alert alert-success' role='alert'>
                Data buku Berhasil Di Update.
                </div>
                ";
         //redirect ke halaman awal
                header("location:../../media.php?module=" . $module);
            } else {
        
        //pesan error gagal hapus data
                echo "data gagal disimpan!!";
            }

endif;