<?php 
 
require_once "../db_connect.php";
require_once "../../validar.php";
 
if($_REQUEST) {
    $id = $_GET['id_comentario'];
    $id_noticia = $_GET['id_noticia'];

    if ($_SESSION['tipo_usuario'] == "1")
    {
    $sql = "DELETE FROM comentarios WHERE id_comentario = ".$id;
    }
    else if ($_SESSION['tipo_usuario'] !== "1")
    {
        echo "<p>Erro: Você precisa ser um administrador para remover comentários!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
        exit;
    }

    if($connect->query($sql) === TRUE) {
        header("Location: ../../ver_noticia.php?id=".$id_noticia);
    } else {
        echo "Erro ao apagar comentário: " . $connect->error;
    }
 
    $connect->close();
}
 
?>