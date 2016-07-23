<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbcon = new PDO("sqlite:tarefas");

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $sql = "select * from tarefas";

    $result = $dbcon->query($sql);
    echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

}elseif($_SERVER["REQUEST_METHOD"] == "PUT"){
    
    $id = substr($_SERVER["PATH_INFO"],1);
    
    $sql = "update tarefas set status = '1' where id = '".$id."'";
    
    if($dbcon->exec($sql) === false){
    
        header("HTTP/1.0 400 Bad Request");
    }else{
        
        echo 'ok';
    }
    
}elseif($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "fez um post";
}


