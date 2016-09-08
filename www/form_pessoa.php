<?
require("funcoes.php");

$modo = $_REQUEST["modo"];
if(empty($modo)) $modo = "add";

if(($modo == "update") || ($modo == "copiar")){
	$cd = trim($_GET["cd"]);
	require("conectar_mysql.php");
	$query = "SELECT cd, nome, usuario, senha, nivel, DATE_FORMAT(expiracao,'%d/%m/%Y %H:%i:%s') as expiracao FROM usuarios WHERE cd=" . $cd;
	$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error(), false);
	$registro = mysql_fetch_assoc($result);
	$cd = $registro["cd"];
	$nome = $registro["nome"];
	$usuario = $registro["usuario"];
	$senha = $registro["senha"];
	$nivel = $registro["nivel"];
	$expiracao = $registro["expiracao"];
	require("desconectar_mysql.php");
}
else $expiracao = "31/12/2099 23:59:59";

inicia_pagina();
monta_titulo_secao("Cadastro de Usuário");
?>
<script language="JavaScript" src="calendar1.js"></script>
<script language="javascript">
	function valida_form(){
		var f = document.forms[0];
		if(f.nome_pessoa.value == ""){
			alert("Informe o nome da pessoa");
			return false;
		}
		if(f.usuario.value == ""){
			alert("Informe o usuário da pessoa.");
			return false;
		}
		if(f.expiracao.value == ""){
			alert("Informe a data de expiração do usuário.");
			return false;
		}
	}
</script>
<table width="100%">
	<tr>
		<td width="25%" valign="top" align="left">
			<? inicia_quadro_azul('width="100%"', "Pessoa"); ?>
			<div style="width: 100%; text-align:justify;">
				<img align="absmiddle" src="imagens/info.gif">
				&nbsp;Neste formul&aacute;rio &eacute; possivel gravar informa&ccedil;&otilde;es dos usurios que usaro internet na sua empresa.
				<hr>
				<center>
					<a title="Clique para adicionar um novo usurio" href="form_pessoa.php?modo=add">
						<img border="0" align="absmiddle" src="imagens/icone_pessoa_mais.gif">
					</a>
					<br>
					<span style="font-size:9px;">Nova Pessoa</span>
				</center>
			</div>
			<? termina_quadro_azul(); ?>
		</td>
		<td width="75%" align="center" valign="top">
			<? inicia_quadro_branco('width="100%"', "Formulário de Cadastro"); ?>
			<form action="salva_pessoa.php" method="post" onSubmit="return valida_form();">
			<center>
				<table width="90%" border="0" cellspacing="3">
					<tr>
						<td class="label" width="30%">Nível de Acesso:</td>
						<td>
							<select name="nivel">
								<option value="0"<? if($nivel == 0) echo(" selected");?>>Restrito</option>
								<option value="2"<? if($nivel == 2) echo(" selected");?>>Pleno</option>
								<option value="1"<? if($nivel == 1) echo(" selected");?>>Master</option>
							</select>
						</td>
						<td width="5%"></td>
					</tr>
					<tr>
						<td class="label">Nome:</td>
						<td><input type="text" name="nome" value="<?=$nome?>" maxlength="255" class="input_text"></td>
						<td></td>
					</tr>
					<tr>
						<td class="label">Usuário:</td>
						<td><input type="text" name="usuario" value="<?=$usuario?>" maxlength="30" class="input_text"></td>
						<td></td>
					</tr>
					<tr>
						<td class="label">Senha:</td>
						<td><input type="text" name="senha" value="<?=$senha?>" maxlength="30" class="input_text"></td>
						<td></td>
					</tr>
					<tr>
						<td class="label">Expiração:</td>
						<td><input type="text" name="expiracao" value="<?=$expiracao?>" maxlength="19" class="input_text"></td>
						<td align="right"><a href="javascript: cal1.popup();"><img src="imagens/cal.gif" border="0" alt="Clique aqui para escolher a data de expiração"></a></td>
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
			</form>
		</td>
	</tr>
</table>
<?
require("desconectar_mysql.php");
termina_pagina();
?>