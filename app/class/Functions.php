<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 11/29/17
 * Time: 7:57 AM
 */

session_start();

class Functions
{
    private $rute;

    function __construct($rute)
    {
        $this->rute = $rute;
    }

    function InputSanitation($q){
        $q = stripslashes($q);
        $q = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"],  $q ) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
        $q = htmlspecialchars( $q );
    }

    function getViewAct($act){
        return "view/".$this->rute."/".$act.".php";
    }

    function alert($text,$type){
        return "<script>$.notify('".$text."', {type:'".$type."',delay:1500});</script>";
    }

    function back(){
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("location:".$_SERVER['HTTP_REFERER']);
        }else{
            header("location:index.php?route=home");
        }
    }

    function createOptions($text,$value,$class,$selected){
        $i = 0;
        foreach ($value as $data){
            if($data==$selected)
                echo "<option value='".$data."' class='".$class."' selected>".$text[$i]."</option>";
            else
                echo "<option value='".$data."' class='".$class."'>".$text[$i]."</option>";

            $i++;
        }
    }

    function generateToken($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $_SESSION['token'] = sha1($randomString);
    }

    function checkLogin($act="stat"){
        if($act=="stat") {
            if (isset($_SESSION['login']))
                if ($_SESSION['login']) return true;

            header("index.php");
        }elseif($act=="val"){
            if (isset($_SESSION['login']))
                if ($_SESSION['login']) return true;

            return false;
        }
    }


}