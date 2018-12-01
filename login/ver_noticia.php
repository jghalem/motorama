<?php
require_once "crud/db_connect.php";

require_once "validar.php";

$id = $_GET['id'];
$sql = 'SELECT id_noticia,titulo,par1,img1,par2,img2,par3,img3,par4,img4,original_poster from noticias where id_noticia =' .$id;
$resultado = $connect->query($sql);

while($dados=$resultado->fetch_array()){
echo '<b>Título: '.$dados['titulo'].'</b></br></br>';
echo 'Parágrafo 1: '.$dados['par1'].'</br> 
Imagem 1: <img src="'.$dados['img1'].'" alt="Img 1"></br></br>';
echo 'Parágrafo 2: '.$dados['par2'].'</br> 
Imagem 2: <img src="'.$dados['img2'].'" alt="Img 2"></br></br>';
echo 'Parágrafo 3: '.$dados['par3'].'</br> 
Imagem 3: <img src="'.$dados['img3'].'" alt="Img 3"></br></br>';
echo 'Parágrafo 4: '.$dados['par4'].'</br> 
Imagem 4: <img src="'.$dados['img4'].'" alt="Img 4"></br></br>';
}

echo '<a href="./index.php"><button type="text">Início</button></a>';

$sqlc = 'SELECT user_comentario,conteudo_comentario,data_comentario from comentarios';
$result = $connect->query($sql);

echo '</br></br><b>Comentários:</b></br>';

echo '<form>';
echo '<textarea id="comment" rows="4" cols="50"></textarea></br>';
echo '<button type="submit" action="comentar.php">Postar</button> | <button onclick="document.getElementById("comment").value=""">Limpar</button>';
echo '</form>';


while($dadosc=$resultado->fetch_array()){
echo '<b><a href="perfil.php?id={$dadosc["user_comentario"]}">'.$dadosc['user_comentario'].'</b> disse, às {$dadosc["data_comentario"]}:</br>';
echo '{$dados["conteudo_comentario"]}</br></br></br>';

}

?>