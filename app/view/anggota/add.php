<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 12/1/17
 * Time: 7:09 AM
 */

if(isset($_POST['simpan'])){
    if(!isset($_POST['id_ks'])||!isset($_POST['mhs'])||!isset($_POST['token']))
        echo $functions->alert("Invalid Input","danger");
    else
        if(empty($_POST['id_ks'])||empty($_POST['mhs'])||!isset($_POST['token']))
            echo $functions->alert("Invalid Input", "danger");
        else {
//            VALID INPUT
            if($_POST['token']==$_SESSION['token']) {
                $data = $_POST;
                if ($app->insertAnggotaKS($data['id_ks'], $data['mhs'])){
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

$mhs = $app->getMhsAnggotaList($_GET['id']);
//var_dump($mhs);

foreach ($mhs as $row){
    $nama[] = $row['nama'];
    $nim[] = $row['nim'];
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
            <input type="hidden" name="id_ks" value="<?php echo $_GET['id']; ?>">

            <div class="form-group row">
                <label for="inputHari" class="col-sm-4 col-form-label">Mahasiswa</label>
                <div class="col-sm-8">
                    <select class="custom-select" name="mhs">
                        <?php
                        $functions->createOptions($nama,$nim,null,null);
                        ?>
                    </select>
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