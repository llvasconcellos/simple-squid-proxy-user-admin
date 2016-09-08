<?
require("funcoes.php");
inicia_pagina_sem_menu();
echo('<center><BR><BR><BR><BR>');
inicia_quadro_branco('width="35%"', "Login");
?>
<BR><BR>
<table width="100%" border="0" cellpadding="0" cellspacing="3">
	<form name="login" action="valida_usuario.php" method="post">
	<tr>
		<td width="40" class="label">Senha:</td>
		<td width="105"><input type="password" name="senha" maxlength="10" class="input_text"></td>
		<td width="20"><input type="image" src="imagens/password.gif"></td>
	</tr>
	</form>
</table>
<BR><BR>
<script language="javascript">
	document.forms[0].elements[0].focus();
</script>
<? 
if($_GET["status"] == "erro") echo('<div style="color: #FF0000">Senha Errada!</div>'); 
termina_quadro_branco();
echo('</center><BR><BR><BR><BR>');
termina_pagina();
?>