<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 11/29/17
 * Time: 7:42 AM
 */

// Config

$hari_list = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");

// End Config

class App
{
    private $dbc;

    function __construct()
    {
        $this->dbc = new mysqli("localhost","root","","pkpl");
    }

    function login($email,$sandi){
        $sql = "SELECT * FROM `users` WHERE `email` = '".$email."' AND `sandi` = '".sha1($sandi)."'";
        $query = $this->dbc->query($sql);
        $data[] = $query->fetch_assoc();
        $data['login'] = false;

        if($query->num_rows==1) {
            $data['login'] = true;
            return $data;
        }
        else
            return $data;
    }

    function getKsList(){
        $sql = "SELECT * FROM `ks`";
        $query = $this->dbc->query($sql);
        while($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data ?? "kosong";
    }

    function getDataKS($id){
        $sql = "SELECT * FROM `ks` WHERE `id_ks` = ".$id;
        $query = $this->dbc->query($sql);
        while($row = $query->fetch_assoc()){
            $data = $row;
        }
        return $data ?? "kosong";
    }

    function getMhsList(){
        $sql = "SELECT * FROM `mahasiswa`";
        $query = $this->dbc->query($sql);
        while($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data ?? "kosong";
    }

    function getMhsAnggotaList($id_ks){
        $sql = "SELECT * FROM `mahasiswa` WHERE  `nim` NOT  IN (SELECT nim FROM `anggota_ks` WHERE id_ks = ".$id_ks.")";
        $query = $this->dbc->query($sql);
        while($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data ?? "kosong";
    }

    function insertDataKS($nama,$jadwal,$dosbim){
        $sql = "INSERT INTO `ks`(`nama_ks`, `jadwal_ks`, `dosen_pembimbing`) VALUES ('".$nama."','".$jadwal."','".$dosbim."')";
        $query = $this->dbc->query($sql);
        return $query;
    }

    function deleteDataKS($id){
        $sql = "DELETE FROM `ks` WHERE `id_ks` = ".$id;
        $query = $this->dbc->query($sql);
        return $query;
    }

    function updateDataKS($nama,$jadwal,$dosbim,$id){
        $sql = "UPDATE `ks` SET `nama_ks`= '".$nama."',`jadwal_ks`= '".$jadwal."',`dosen_pembimbing`= '".$dosbim."' WHERE `id_ks` = ".$id;
        $query = $this->dbc->query($sql);
        return $query;
    }

    function getAnggotaKS($id_ks){
        $sql = "SELECT ks.id_ks, mahasiswa.nama as nama_mhs, ks.nama_ks as nama_ks, mahasiswa.nim as nim FROM `ks`,`mahasiswa`,`anggota_ks` WHERE anggota_ks.id_ks = ".$id_ks." AND ks.id_ks = anggota_ks.id_ks AND mahasiswa.nim = anggota_ks.nim";
        $query = $this->dbc->query($sql);
        while($row = $query->fetch_assoc()){
            $data[] = $row;
        }
        return $data ?? "kosong";
    }

    function deleteAnggotaKS($id_ks,$nim){
        $sql = "DELETE FROM `anggota_ks` WHERE `id_ks` = ".$id_ks." AND `nim` = ".$nim;
        $query = $this->dbc->query($sql);
        return $query;
    }

    function insertAnggotaKS($id_ks,$nim){
        $sql = "INSERT INTO `anggota_ks`(`id_ks`, `nim`) VALUES ('".$id_ks."','".$nim."')";
        $query = $this->dbc->query($sql);
        return $query;
    }
}