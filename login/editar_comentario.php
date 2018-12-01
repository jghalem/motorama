<?php
require_once "crud/db_connect.php";

require_once "validar.php";

if ($_REQUEST)
{
$id_noticia = $_GET['id_noticia'];
$id_comentario = $_GET['id_comentario'];
$conteudo_comentario = $_GET['conteudo_comentario'];
$sql = 'SELECT conteudo_comentario from comentarios where id_comentario =' .$id_comentario;
$resultado = $connect->query($sql);

echo '</br><b>Editando comentário:</b></br>';
echo '<form name=comentario action="crud/comentarios/update.php?id_comentario='.$id_comentario.'&id_noticia='.$id_noticia.'&conteudo_comentario='.$conteudo_comentario.' method="GET">';

while($dados=$resultado->fetch_array())
{
echo '<textarea name="conteudo_comentario" rows="4" cols="50" maxlength="200" >'.$conteudo_comentario.'</textarea></br>';
echo '<input type="hidden" value="'.$id_comentario.'">';
echo '<input type="hidden" value="'.$id_noticia.'">';
echo '<button type="submit">Enviar</button>';
}
echo '</form>';
}
?>