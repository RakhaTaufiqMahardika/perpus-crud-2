<?php
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        echo $username.$password;

        include "koneksi.php";
        $query_login=mysqli_query($koneksi,"SELECT * FROM admin where username = '".$username."'");
        // echo mysqli_num_rows($query_login);
        if (mysqli_num_rows($query_login)>0) {
            $data_login = mysqli_fetch_array($query_login);
            session_start();
            $_SESSION['id_admin']=$data_login['id_admin'];
            $_SESSION['usename']=$data_login['username'];
            $_SESSION['status_admin']=true;
            echo "<script>alert('Login Berhasil');location.href='tampil_kelas.php';</script>";
        }
        else{
            echo "<script>alert('Login Gagal');location.href='index.php';</script>";
        }
    }
?>