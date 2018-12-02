<?php 
// Inicia sessões 
session_start(); 

// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome"])) 
{ 
// Usuário não logado! Redireciona para a página de login 
//header("Location: login.html"); 
echo "Você foi desconectado. Retornando para a página inicial..";
sleep(5);
session_destroy();
header("Location: login.html");
} 
?> 