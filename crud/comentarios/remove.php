<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM comentarios WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Comentário apagado com sucesso!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao apagar comentário: " . $connect->error;
    }
 
    $connect->close();
}
 
?>