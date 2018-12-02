<?php 
 
require_once "../db_connect.php";
require_once "../../validar.php";

if($_GET) {
    $cr_comentario = $_GET['conteudo_comentario'];
    $cr_id_comentario = $_GET['id_comentario'];
    $cr_id_noticia = $_GET['id_noticia'];

    if ($_SESSION['tipo_usuario'] == "1" OR "2")
    {
    $sql = "UPDATE comentarios SET conteudo_comentario = '{$cr_comentario}' WHERE id_comentario = {$cr_id_comentario}";
    }
    if($connect->query($sql) === TRUE) {
        header("Location: ../../ver_noticia.php?id={$cr_id_noticia}");
    } else {
        echo "Erro atualizando comentário : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>