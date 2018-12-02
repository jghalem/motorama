<?php
require_once "crud/db_connect.php";

require_once "validar.php";

if ($_REQUEST)
{
$id_noticia = $_GET['id_noticia'];
$id_comentario = $_GET['id_comentario'];
$conteudo_comentario = $_GET['conteudo_comentario'];
if ($_SESSION['tipo_usuario'] == "1" OR "2")
{
$sql = 'SELECT conteudo_comentario from comentarios where id_comentario =' .$id_comentario;
}
$resultado = $connect->query($sql);

echo '</br><b>Editando comentário:</b></br>';
echo '<form name=comentario action="crud/comentarios/update.php?conteudo_comentario='.$conteudo_comentario.'&id_comentario='.$id_comentario.'&id_noticia='.$id_noticia.' method="GET">';

while($dados=$resultado->fetch_array())
{
echo '<textarea name="conteudo_comentario" rows="4" cols="50" maxlength="200" >'.$conteudo_comentario.'</textarea></br>';
echo '<input type="hidden" name="id_comentario" value="'.$id_comentario.'">';
echo '<input type="hidden" name="id_noticia" value="'.$id_noticia.'">';
echo '<button type="submit">Enviar</button>';
}
echo '</form>';
}
?>