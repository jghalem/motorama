<?php 
 
require_once "../db_connect.php";
require_once "../../validar.php";
 
if($_GET) {
    $cr_id_noticia = $_GET['id_noticia'];
    $cr_user_comentario = $_SESSION["id_usuario"];
    $cr_conteudo_comentario = $_GET['conteudo_comentario'];	


    echo '<input type="hidden" name="id_noticia" value='.$cr_id_noticia.'></br>';

    if ($_SESSION['tipo_usuario'] == "1" OR "2")
    {
    $sql = "INSERT INTO comentarios (user_comentario,conteudo_comentario,noticia) VALUES ('$cr_user_comentario', '$cr_conteudo_comentario', '$cr_id_noticia')";
    }

    if($connect->query($sql) === TRUE) {
        header('Location: ../../ver_noticia.php?id='.$cr_id_noticia.'');
    } else {
        echo "Erro " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>