<?php 
 
require_once '../db_connect.php';
 
if($_POST) {
    $cr_titulo = $_POST['titulo'];
    $cr_par1 = $_POST['par1'];
    $cr_img1 = $_POST['img1'];
    $cr_par2 = $_POST['par2'];
    $cr_img2 = $_POST['img2'];
    $cr_par3 = $_POST['par3'];
    $cr_img3 = $_POST['img3'];
    $cr_par4 = $_POST['par4'];
    $cr_img4 = $_POST['img4'];
	
    if ($_POST['tipo_usuario'] == "administrador")
    {
    $sql = "INSERT INTO noticias (titulo, par1, img1, par2, img2, par3, img3, par4, img4) VALUES ('$cr_titulo', '$cr_par1', '$cr_img1', '$cr_par2', '$cr_img2', '$cr_par3', '$cr_img3', '$cr_par4', '$cr_img4')";
    }
    else if ($_POST['tipo_usuario'] !== "administrador")
    {
        echo "<p>Erro: Somente um administrador pode criar notícias!</p>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
        exit
    }

    if($connect->query($sql) === TRUE) 
    {
        echo "<p>Notícia criada com sucesso!</p>";
        echo "<a href='../create.php'><button type='button'>Voltar</button></a>";
        echo "<a href='../index.php'><button type='button'>Início</button></a>";
    }
    else
    {
        echo "Erro " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>