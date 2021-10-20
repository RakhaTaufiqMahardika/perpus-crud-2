<?php
    if($_POST){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        if(empty($username)){
            echo "<script>alert('nama admin tidak boleh kosong');location.href='register.php';</script>";
        } 
        elseif(empty($email)){
            echo "<script>alert('email tidak boleh kosong');location.href='register.php';</script>";
        } 
        elseif(empty($password)){
            echo "<script>alert('password tidak boleh kosong');location.href='register.php';</script>";
        } 
        else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into admin (username, email, password)
         value ('".$username."','".$email."','".$password."')") 
         or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses menambahkan admin');location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan admin');location.href='register.php';</script>";
        }
    }
}
?>