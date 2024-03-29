<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 11/29/17
 * Time: 7:41 AM
 */

require("class/App.php");
require("class/Functions.php");

$rute = isset($_GET['route']) ? $_GET['route'] : "home";
$act = isset($_GET['act']) ? $_GET['act'] : "list";

$app = new App();
$functions = new Functions($rute);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengelolaan Anggota KS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="assets/css/notify.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs  .cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="assets/js/notify.js"></script>
</head>
<body>
<?php
if($functions->checkLogin("val")){
?>
    <div class="container">

    <?php
    require "view/default/navbar.php";
    ?>

    <?php
    switch ($rute){
        case "home":
            require "view/home/index.php";
            break;
        case "ks":
            require ($functions->getViewAct($act));
            break;
        case "anggota":
            require ($functions->getViewAct($act));
            break;
        default:
            echo "404, Page Not Found";
    }
    ?>

    </div>

<script>
    $(document).ready(function(){
        $('input.timepicker').timepicker({});
    });
</script>
<?php
}else{
    require "view/home/login.php";
}
?>

</body>
</html>
