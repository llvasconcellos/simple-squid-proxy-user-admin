<?
#Abaixo o caminho para o arquivo do blacklist
$arquivo_blacklist = "lixo.txt";

$blacklist = file_get_contents($arquivo_blacklist);
require("funcoes.php");

$modo = $_REQUEST["modo"];
if(empty($modo)) $modo = "add";

inicia_pagina();
monta_titulo_secao("Edição de BlackList");
?>
<table width="100%">
	<tr>
		<td width="25%" valign="top" align="left">
			<? inicia_quadro_azul('width="100%"', "BlackList"); ?>
			<div style="width: 100%; text-align:justify;">
				<img align="absmiddle" src="imagens/info.gif">
				&nbsp;Neste formul&aacute;rio &eacute; possivel listar os sites que os usuários não poderão acessar usando a internet da empresa.
				<hr>
			</div>
			<? termina_quadro_azul(); ?>
		</td>
		<td width="75%" align="center" valign="top">
			<? inicia_quadro_branco('width="100%"', "BlackList"); ?>
			<form action="salva_blacklist.php" method="post">
			<center>
				<table width="90%" border="0" cellspacing="3">
					<tr>
						<td><textarea name="blacklist" class="input_text" style="height:300px; background-image:none;"><?=$blacklist?></textarea></td>
					</tr>
				</table>
			</center>
			<? termina_quadro_branco(); ?>
			
			<br>
			<? inicia_quadro_branco('width="100%"', "Grava Informações"); ?>
			<table width="100%">
				<tr>
					<td align="right"><?
							if($modo == "update") echo('<input type="button" value="Apagar" class="botao_aqua" onclick="self.location=\'salva_pessoa.php?modo=apagar&cd=' . $cd . '\'">');
							elseif ($modo == "add") echo('<input type="reset" value="Limpar Campos" class="botao_aqua">');
							?>&nbsp;<input type="submit" value="Salvar" class="botao_aqua">
					</td>
				</tr>
			</table>
			<script language="javascript">
				document.forms[0].elements[1].focus();
				var cal1 = new calendar1(document.forms[0].elements['expiracao']);
				cal1.year_scroll = true;
				cal1.time_comp = true;
			</script>
			<? termina_quadro_branco(); ?>
			<?
			if($modo != "update") $modo = "add";
			echo('<input type="hidden" name="modo" value="' . $modo . '">');
			echo('<input type="hidden" name="cd" value="' . $cd . '">');
			?>
				<input type="hidden" name="arquivo_blacklist" value="<?=$arquivo_blacklist?>" />
			</form>
		</td>
	</tr>
</table>
<?
require("desconectar_mysql.php");
termina_pagina();
?>