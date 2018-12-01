<?php 
 
require_once "../db_connect.php";
require_once "../../validar.php";
 
if($_POST) {
    $cr_comentario = $_POST['conteudo_comentario'];
    $cr_id_comentario = $_POST['id_comentario'];
    $cr_id_noticia = $_POST['id_noticia'];
 
    $sql = "UPDATE comentarios SET conteudo_comentario = '.$cr_comentario.' WHERE id_comentario = ".$cr_id_comentario;
    if($connect->query($sql) === TRUE) {
        echo "<a href='../edit.php?id=".$id."'><button type='button'>Voltar</button></a>";
        header("Location: ../../ver_noticia.php?id='.$cr_id_noticia.'");
    } else {
        echo "Erro atualizando comentário : ". $connect->error;
    }
 
    $connect->close();
 
}
 
?>