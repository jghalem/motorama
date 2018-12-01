<?php
require_once "crud/db_connect.php";

require_once "validar.php";

$id = $_GET['id'];
$sql = 'SELECT id_noticia,titulo,par1,img1,par2,img2,par3,img3,par4,img4,original_poster from noticias where id_noticia =' .$id;
$resultado = $connect->query($sql);

echo '<form method="post" action="crud/noticias/update.php?id='.$id.'">';

while($dados=$resultado->fetch_array()){
echo 'Testando</br>Título: <input type="text" name="titulo" value="'.$dados['titulo'].'"></br>';
echo 'Parágrafo 1: <input type="text" name="par1" value="'.$dados['par1'].'"></br>';
echo 'Imagem 1: <input type="text" name="img1" value="'.$dados['img1'].'"></br>';
echo 'Parágrafo 2: <input type="text" name="par2" value="'.$dados['par2'].'"></br>';
echo 'Imagem 2: <input type="text" name="img2" value="'.$dados['img2'].'"></br>';
echo 'Parágrafo 3: <input type="text" name="par3" value="'.$dados['par3'].'"></br>';
echo 'Imagem 3: <input type="text" name="img3" value="'.$dados['img3'].'"></br>';
echo 'Parágrafo 4: <input type="text" name="par4" value="'.$dados['par4'].'"></br>';
echo 'Imagem 4: <input type="text" name="img4" value="'.$dados['img4'].'"></br>';
echo '<input type="hidden" name="id" value="'.$dados['id_noticia'].'"></br>';
}

echo '<button type="submit">Enviar</button>';
echo '</form>'
?>