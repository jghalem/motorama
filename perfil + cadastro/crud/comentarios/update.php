<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $cr_comentario = $_POST['comentario'];
	
	
    $id = $_POST['id_comentario'];
 
    $sql = "UPDATE comentarios SET comentario = '$cr_comentario' WHERE id_comentario = {$id}";
    if($connect->query($sql) === TRUE) {
        echo "<p>Comentário atualizado com sucesso!</p>";
        echo "<a href='../edit.php?id=".$id."'><button type='button'>Voltar</button></a>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro atualizando comentário : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>