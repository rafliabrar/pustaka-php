<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

//bagian insert data
if ($module == 'siswa' and $act == 'insert') :
//inisiasi nama field ke dalam variabel
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

//query insert
    $query = "INSERT INTO muda_siswa (nisn,nama_siswa,jurusan,jenis_kelamin,no_hp,alamat)
          VALUES ('$nisn' , '$nama' , '$jurusan' , '$jekel', '$no_hp' , '$alamat')";

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

elseif ($module == 'siswa' and $act == 'delete') :

// ambil id siswa
    $id = $_GET['id'];

// query delete data
    $query = "DELETE FROM muda_siswa WHERE nisn =$id";
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
elseif ($module == 'siswa' and $act == 'update') :

//inisialisasi
    $id = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];


         // query update data
         $query ="UPDATE muda_siswa SET
         nama_siswa ='$nama',
         jurusan    ='$jurusan',
         jenis_kelamin ='$jekel',
         no_hp = '$no_hp',
         alamat = '$alamat'
         WHERE nisn = $id";

         //kondisi pengecekan apakah data berhasil update
    if ($connection->query($query)) {
        //munculkan alert sukses update data
                session_start();
                $_SESSION["alert"] = "
                <div class = 'alert alert-success' role='alert'>
                Data Siswa Berhasil Di Update.
                </div>
                ";
         //redirect ke halaman awal
                header("location:../../media.php?module=" . $module);
            } else {
        
        //pesan error gagal hapus data
                echo "data gagal disimpan!!";
            }

endif;
