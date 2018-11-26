<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM noticias WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Notícia apagada com sucesso!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao apagar notícia: " . $connect->error;
    }
 
    $connect->close();
}
 
?>