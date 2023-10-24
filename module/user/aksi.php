<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi module & act
$module = $_GET['module'];
$act = $_GET['act'];

// cek mode dan act 
if  ($module == 'user' and $act == 'insert') :

    //inisialisasi data ke dalam variable

    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    // fungsi hash passwrd
    $password = password_hash($pass, PASSWORD_DEFAULT);

    //query insert user 
    $query = "INSERT INTO muda_user (nama_user , username , password , level , is_active)
             VALUES ('$nama' , '$username' , '$password' , '$level' , '1')";

    if ($connection->query($query)){

        header("location: ../../media.php?module=".$module);
    }
    else{
        echo "eror";
    }

endif;
    