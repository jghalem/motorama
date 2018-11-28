<?php
require "crud/db_connect.php";

$sql = 'SELECT id_noticia,titulo,par1,img1,par2,img2,par3,img3,par4,img4 from noticias where id_noticia ='.$_REQUEST['id'];
$resultado = $MySQLiconn->query($sql);

while($dados=$resultado->fetch_array()){
echo '<form>';
echo 'Testando</br>Título: <input type="text" name="titulo" value="'.$dados['titulo'].'">';
echo 'Parágrafo 1: <input type="text" name="par1" value="'.$dados['par1'].'">';
echo 'Imagem 1: <input type="text" name="img1" value="'.$dados['img1'].'">';
echo 'Parágrafo 2: <input type="text" name="par2" value="'.$dados['par2'].'">';
echo 'Imagem 2: <input type="text" name="img2" value="'.$dados['img2'].'">';
echo 'Parágrafo 3: <input type="text" name="par3" value="'.$dados['par3'].'">';
echo 'Imagem 3: <input type="text" name="img3" value="'.$dados['img3'].'">';
echo 'Parágrafo 4: <input type="text" name="par4" value="'.$dados['par4'].'">';
echo 'Imagem 4: <input type="text" name="img4" value="'.$dados['img4'].'">';
echo '<button type="submit" action="update.php">Enviar</button></form>';
}

?>