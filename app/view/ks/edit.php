<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 12/1/17
 * Time: 7:09 AM
 */
if(!isset($_GET['id'])) $functions->back();

if(isset($_POST['simpan'])){
    if(!isset($_POST['nama'])||!isset($_POST['hari'])||!isset($_POST['jam'])||!isset($_POST['dosbim']))
        echo $functions->alert("Invalid Input","danger");
    else
        if(empty($_POST['nama'])||empty($_POST['hari'])||empty($_POST['jam'])||empty($_POST['dosbim']))
            echo $functions->alert("Invalid Input", "danger");
        else {
//            VALID INPUT
            $data = $_POST;
            $data['jadwal'] = $data['hari']." ".$data['jam'];
            if($app->updateDataKS($data['nama'],$data['jadwal'],$data['dosbim'],$_GET['id']))
                echo $functions->alert("Data Updated", "success");
            else
                echo $functions->alert("Data Unupdated", "danger");
        }

}
$hari_list = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
$data = $app->getDataKS($_GET['id']);

$temp = explode(' ',$data['jadwal_ks']);
$hari = $temp[0];
$jam = $temp[1]." ".$temp[2];
?>
<div class="row">
    <div class="col-md-10">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?route=ks">Data KS</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form method="post" action="">
            <div class="form-group row">
                <label for="inputNamaKS" class="col-sm-4 col-form-label">Nama Kelompok Studi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama" id="inputNamaKS" placeholder="Contoh : Kelompok Studi Web" value="<?php echo $data['nama_ks']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHari" class="col-sm-4 col-form-label">Hari Kumpul</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="hari">
                            <?php
                            $functions->createOptions($hari_list,$hari_list,null,$hari);
                            ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputJam" class="col-sm-4 col-form-label">Jam Kumpul</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control timepicker" name="jam" id="inputJam" placeholder="Contoh : 12:00 AM"  value="<?php echo $jam; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDosbim" class="col-sm-4 col-form-label">Dosen Pembimbing</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="dosbim" id="inputDosbim" placeholder="Contoh : Pak Fiftin" value="<?php echo $data['dosen_pembimbing']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" name="simpan" class="btn btn-primary pull-right" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>

