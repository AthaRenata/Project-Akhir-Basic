<?php 
if(isset($_POST['id'])){
    require_once "../system/config.php";
     try {
        $querySql = "DELETE FROM articles WHERE id = :id";
        $statement = $connect->prepare($querySql);
        $statement->execute(["id"=>$_POST['id']]);
        header("location:index.php");
     } catch (\Exception $e) {
        echo "Error : ".$e->getMessage();
     }
    }
?>