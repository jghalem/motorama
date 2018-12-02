<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $cr_comentario = $_POST['comentario'];
	
 
    $sql = "INSERT INTO comentarios (comentario) VALUES ('$cr_comentario')";
    if($connect->query($sql) === TRUE) {
        echo "<p>Comentário criado com sucesso!</p>";
        echo "<a href='../create.php'><button type='button'>Voltar</button></a>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    } else {
        echo "Erro " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>