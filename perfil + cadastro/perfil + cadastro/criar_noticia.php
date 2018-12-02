<?php
require_once "crud/db_connect.php";
require_once "validar.php";

echo '<form method="post" action="crud/noticias/create.php">';
echo 'Testando</br></br>Título: <input type="text" name="titulo"></br></br>';
echo 'Parágrafo 1: <input type="text" name="par1"></br>';
echo 'Imagem 1: <input type="text" name="img1"></br></br>';
echo 'Parágrafo 2: <input type="text" name="par2"></br>';
echo 'Imagem 2: <input type="text" name="img2"></br></br>';
echo 'Parágrafo 3: <input type="text" name="par3"></br>';
echo 'Imagem 3: <input type="text" name="img3"></br></br>';
echo 'Parágrafo 4: <input type="text" name="par4"></br>';
echo 'Imagem 4: <input type="text" name="img4"></br></br>';

echo '<button type="submit">Enviar</button></form><a href="index.php"><button type="text">Voltar</button></a>';
?>