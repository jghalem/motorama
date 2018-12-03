<?php
 
require_once "../db_connect.php";

require_once "../../validar.php";
 
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
    $cr_preview = $_POST['preview'];
	
    if ($_SESSION['tipo_usuario'] == "1")
    {
    $sql = "INSERT INTO noticias (titulo, par1, img1, par2, img2, par3, img3, par4, img4, preview, original_poster) VALUES ('$cr_titulo', '$cr_par1', '$cr_img1', '$cr_par2', '$cr_img2', '$cr_par3', '$cr_img3', '$cr_par4', '$cr_img4', '$cr_preview', '{$_SESSION["id_usuario"]}')";
    }
    else if ($_POST['tipo_usuario'] !== "1")
    {
        echo "<p>Erro: Somente um administrador pode criar notícias!</p>";
        echo "<a href='../../index.php'><button type='button'>Início</button></a>";
        exit;
    }

    if($connect->query($sql) === TRUE) 
    {
        header("Location: ../../index.php");
    }
    else
    {
        echo "Erro ao criar a noticia: " . $connect->error;
    }
 
    $connect->close();
}
 
?>