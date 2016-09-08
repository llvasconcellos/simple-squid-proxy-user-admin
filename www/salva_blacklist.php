<?
require("funcoes.php");
require("permissao_documento.php");

$blacklist = $_REQUEST["blacklist"];
$arquivo_blacklist = $_REQUEST["arquivo_blacklist"];

if(file_put_contents($arquivo_blacklist, $blacklist))
	tela_ok("Arquivo de BlackList gravado com sucesso!", "form_blacklist.php");
else
	tela_erro("Erro ao gravar arquivo de blacklist: " . $arquivo_blacklist, false);
?>