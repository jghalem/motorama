<?php 
// Verificador de sessão 
require "verifica.php"; 

// Verifica se usuário tem permissão para postar notícia 
if($_SESSION["permissao"] !== "S") 
{ 
echo "Você não tem permissão para postar notícias!"; 
exit; 
} 

// Se o script continuar aqui, é que o usuário tem permissão 
// Então.. seu formulário de postagem abaixo 

echo "criar a estrutura par apostar";
?>