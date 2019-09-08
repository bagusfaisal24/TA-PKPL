<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 11/30/17
 * Time: 7:34 PM
 */

if(isset($_GET['ac'])&&isset($_GET['id']))
        if($_GET['ac']=="del")
        if($app->deleteDataKS($_GET['id']))
            echo $functions->alert("Data Deleted", "success");
        else
            echo $functions->alert("Data Undeleted", "danger");


$data = $app->getKsList();
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
        <a class="btn btn-block btn-success" href="?route=<?php echo $_GET['route']; ?>&act=add">Tambah KS</a>
    </div>
</div>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nama KS</th>
        <th scope="col">Jadwal Kumpul</th>
        <th scope="col">Dosen Pembimbing</th>
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
            <td><?php echo $row['nama_ks']; ?></td>
            <td><?php echo $row['jadwal_ks']; ?></td>
            <td><?php echo $row['dosen_pembimbing']; ?></td>
            <td>
                <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin Ingin Menghapus ?')" href="?route=ks&ac=del&id=<?php echo $row['id_ks']; ?>"><i class="fa fa-trash"></i></a>
                <a class="btn btn-sm btn-info" href="?route=ks&act=edit&id=<?php echo $row['id_ks']; ?>"><i class="fa fa-edit"></i></a>
            </td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>
