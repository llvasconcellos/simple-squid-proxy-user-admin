<?
require("funcoes.php");
inicia_pagina();
//session_destroy();
?>
<table width="100%">
	<tr>
		<td width="30"><a href="index.php"><img title="Login" border="0" src="imagens/login.gif"></a></td>
		<td></td>
	</tr>
</table>
<hr>
<center>
<?
inicia_quadro_branco('width="500"', 'Sucesso!'); ?>
	<table width="100%">
		<tr>
			<td><img src="imagens/ok.jpg"></td>
			<td>Obrigado por utilizar o sistema. Tenha um bom dia!</td>
		</tr>
	</table>
<?
termina_quadro_branco(); 
echo('</center>');
termina_pagina();
?>