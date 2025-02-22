<?php 
    require_once "../classes/DB.php";
    session_start();
    $db;
    if(!isset($_SESSION["db"])){
        $db = new DB();
        $_SESSION["db"] = $db;
    }else{
        $db = $_SESSION["db"];
    }
    var_dump($_POST["data"]);
    $db->insertConcerto(
        $_POST["titolo"],
        $_POST["descrizione"],
        $_POST["data"],
        $_POST["idSala"],
        $_POST["idOrchestra"],
    );
    header("Location: http://localhost/concerti/");
?>