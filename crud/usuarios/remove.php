<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM usuarios WHERE id = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Usuário apagado com sucesso!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro ao apagar usuário: " . $connect->error;
    }
 
    $connect->close();
}
 
?>