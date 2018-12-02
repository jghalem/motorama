<?php
//Conexão com o banco de dados
require_once "crud/db_connect.php";
//Validação de usuário
require_once "validar.php";

//Buscando a notícia no banco de dados e imprimindo
$sql = 'SELECT id_noticia,titulo,par1,img1,par2,img2,par3,img3,par4,img4,original_poster from noticias where id_noticia =' .$_GET['id'];
$resultado = $connect->query($sql);

while($dados=$resultado->fetch_array()){
echo '<b>Título: '.$dados['titulo'].'</b></br></br>';

echo 'Parágrafo 1: '.$dados['par1'].'</br> 
Imagem 1: <img src="'.$dados['img1'].'" alt="Img 1"></br></br>';
if ($dados['par2'] and $dados['img2'])
{
echo 'Parágrafo 2: '.$dados['par2'].'</br> 
Imagem 2: <img src="'.$dados['img2'].'" alt="Img 2"></br></br>';
}
if ($dados['par3'] and $dados['img3'])
{
echo 'Parágrafo 3: '.$dados['par3'].'</br> 
Imagem 3: <img src="'.$dados['img3'].'" alt="Img 3"></br></br>';
}
if ($dados['par4'] and $dados['img4'])
{
echo 'Parágrafo 4: '.$dados['par4'].'</br> 
Imagem 4: <img src="'.$dados['img4'].'" alt="Img 4"></br></br>';
}

//Caso seja um admin, terá acesso aos botões de edição de notícia
if ($_SESSION['tipo_usuario'] == '1')
{
echo "<a href='editar_noticia.php?id=".$dados['id_noticia']."'><button type='text'>Editar</button></a>";
echo " | <a href='crud/noticias/remove.php?id=".$dados['id_noticia']."'><button type='text'>Deletar</button></a></br></br>";
}
}

echo '<a href="./index.php"><button type="text">Início</button></a>';

//Comentários

echo '</br></br><b>Deixe seu comentário:</b></br>';
echo '<form action="crud/comentarios/create.php?id='.$_GET['id'].'" method="get">';
echo '<textarea name="conteudo_comentario" rows="4" cols="50" maxlength="200"></textarea></br>';
echo '<input type="hidden" name="id_noticia" value='.$_GET['id'].'></br>';
echo '<button type="submit">Postar</button> | <button type="reset">Limpar</button>';
echo '</form>';

$sqlc = 'SELECT id_comentario,user_comentario,conteudo_comentario,data_comentario from comentarios ORDER BY data_comentario DESC';
$result = $connect->query($sqlc);

/*$sqlc1 = 'SELECT * from usuarios WHERE username ='.;
$result1 = $connect->query($sqlc1);
$dadosc1 = $result1->fetch_array();*/

//Inicio comentarios
/*if (!$result)
{
echo "Nenhum comentário ainda.. Que tal ser o primeiro? :)</br></br>";
}*/

//Geral - Comentários
echo '</br></br><b>Comentários:</b></br>';

while($dadosc=$result->fetch_array()){
$sqlc1 = 'SELECT username,tipo_usuario from usuarios WHERE id_usuario ='.$dadosc["user_comentario"];
$result1 = $connect->query($sqlc1);
$dadosc1 = $result1->fetch_array();
$user = $dadosc1["username"];
$tipo = $dadosc1["tipo_usuario"];
//Modelo de comentário
echo '<a href="perfil.php?id= '.$user.'"><b>'.$user;
if ($user == "1")
{
echo '</a> *';
}
echo '</a></b> disse, às '.$dadosc["data_comentario"].':</br>';
echo ''.$dadosc["conteudo_comentario"].'</br></br>';
//Caso seja admin, terá acesso aos botões de edição de comentário
if ($_SESSION['tipo_usuario'] == '1')
{
echo "<a href='editar_comentario.php?id_comentario=".$dadosc['id_comentario']."&id_noticia=".$_GET['id']."&conteudo_comentario=".$dadosc['conteudo_comentario']."'><button type='text'>Editar</button></a>";
echo " | <a href='crud/comentarios/remove.php?id_comentario=".$dadosc['id_comentario']."&id_noticia=".$_GET['id']."'><button type='text'>Deletar</button></a></br></br>";
}
echo "</br>";
}

?>