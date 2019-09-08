<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 12/16/17
 * Time: 6:38 PM
 */


if(isset($_GET['ac'])&&isset($_GET['id']))
    if($_GET['ac']=="del")
        if($app->deleteAnggotaKS($_GET['id'],$_GET['nim']))
            echo $functions->alert("Data Deleted", "success");
        else
            echo $functions->alert("Data Undeleted", "danger");


$data = $app->getAnggotaKS($_GET['id']);
?>

<div class="row">
    <div class="col-md-10">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?route=ks">Data KS</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-2">
        <a class="btn btn-block btn-success" href="?route=<?php echo $_GET['route']; ?>&ac=ks_list&id=<?php echo $_GET['id']; ?>&act=add">Tambah Anggota</a>
    </div>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Anggota</th>
        <th scope="col">NIM</th>
        <th scope="col">KS PILIHAN</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i = 1;
    foreach ($data as $row) {
        ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row['nama_mhs']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama_ks']; ?></td>
            <td>
                <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin Ingin Menghapus ?')" href="?route=anggota&act=ks_list&ac=del&id=<?php echo $row['id_ks']; ?>&nim=<?php echo $row['nim']; ?>"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>
