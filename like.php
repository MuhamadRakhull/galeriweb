<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['userid'])){
        //untuk like harus login ya gesssss
        header("location:index.php");
    }else{
        $fotoid=$_GET['fotoid'];
        $userid=$_SESSION['userid'];
        //cek user like blm

        $sql=mysqli_query($conn,"SELECT * FROM likefoto WHERE fotoid='$fotoid' and userid='$userid'");

        if(mysqli_num_rows($sql)==1){
            //user sudah pernah lik poto ini
            header('location:index.php');
        }else{
            $tanggallike=date("Y-m-d H:i:s");
            mysqli_query($conn,"INSERT INTO likefoto VALUE('','$fotoid','$userid','$tanggallike')");
            header('location:index.php');
        }
    }


    
?>