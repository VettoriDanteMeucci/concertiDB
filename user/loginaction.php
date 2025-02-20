<?php 
    require_once "../classes/DB.php";
    session_start();
    $db = $_SESSION["db"];
    $user = null;
    if(isset($_POST["username"]) && isset($_POST["password"]) ){
        $user = $db->loginAdmin($_POST["username"], $_POST["password"]);
        var_dump($user);
        if($user == null){
            header("Location: http://localhost/concerti/pages/login.php");
        }else{
            $_SESSION["user"] = $user;
            header("Location: http://localhost/concerti/index.php");
        }
    }
?>