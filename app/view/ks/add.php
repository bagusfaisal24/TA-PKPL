<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 12/1/17
 * Time: 7:09 AM
 */

if(isset($_POST['simpan'])){
    if(!isset($_POST['nama'])||!isset($_POST['hari'])||!isset($_POST['jam'])||!isset($_POST['dosbim'])||!isset($_POST['token']))
        echo $functions->alert("Invalid Input","danger");
    else
        if(empty($_POST['nama'])||empty($_POST['hari'])||empty($_POST['jam'])||empty($_POST['dosbim'])||!isset($_POST['token']))
            echo $functions->alert("Invalid Input", "danger");
        else {
//            VALID INPUT
            if($_POST['token']==$_SESSION['token']) {
                $data = $_POST;
                $data['jadwal'] = $data['hari'] . " " . $data['jam'];
                if ($app->insertDataKS($data['nama'], $data['jadwal'], $data['dosbim'])){
                    echo $functions->alert("Data Saved", "success");
                    $functions->generateToken();
                }
                else
                    echo $functions->alert("Data Unsaved", "danger");
            }else{
                echo $functions->alert("Invalid Input", "danger");
            }
        }
}

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
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <div class="form-group row">
                <label for="inputNamaKS" class="col-sm-4 col-form-label">Nama Kelompok Studi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama" id="inputNamaKS" placeholder="Contoh : Kelompok Studi Web" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHari" class="col-sm-4 col-form-label">Hari Kumpul</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="hari">
                        <?php
                        $functions->createOptions($hari_list,$hari_list,null,null);
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputJam" class="col-sm-4 col-form-label">Jam Kumpul</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control timepicker" name="jam" id="inputJam" placeholder="Contoh : 12:00 AM" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDosbim" class="col-sm-4 col-form-label">Dosen Pembimbing</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="dosbim" id="inputDosbim" placeholder="Contoh : Pak Fiftin" required>
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