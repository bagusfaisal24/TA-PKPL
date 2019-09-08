<?php
/**
 * Created by PhpStorm.
 * User: naufal
 * Date: 12/2/17
 * Time: 7:22 AM
 */

if(isset($_POST['login']))
    if(isset($_POST['email'])&&isset($_POST['password'])){
        $data = $app->login($_POST['email'],$_POST['password']);
        if($data['login']){
            $_SESSION = $data;
            $functions->generateToken();
            header("index.php?route=home");
        }
    }


?>
<div class="container">
    <div class="col-md-4">
        <form class="login-form" action="" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
            </div>
            <input type="submit" name="login" class="btn btn-primary" value="Login">
        </form>
    </div>
</div>