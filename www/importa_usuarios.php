<?
require("funcoes.php");

if(strlen($arquivo = $_FILES["passwd"])>0){
	require("conectar_mysql.php");
	$arquivo = file($_FILES["passwd"]["tmp_name"]);
	foreach($arquivo as $value){
		$tmp = split(":", $value);
		$usuario = $tmp[0];
		$query = "SELECT usuario FROM usuarios WHERE usuario='" . $usuario . "'";
		$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error(), false);
		if(mysql_num_rows($result)==0){ 
			$query = "INSERT INTO usuarios (nome, usuario, senha, nivel, expiracao) VALUES ";
			$query .= "('" . $usuario ."',";
			$query .= "'" . $usuario ."',";
			$query .= "'gerado por importacao',";
			$query .= "'" . $_POST["nivel"] ."',";
			$query .= "'2099-12-31 23:59:00')";
			$result = mysql_query($query) or tela_erro("Erro ao atualizar registros no Banco de dados: " . mysql_error(), false);
		}
	}
	echo('<script language="JavaScript">alert("Operação realizada com sucesso!");</script>');
	require("desconectar_mysql.php");
}




inicia_pagina();
monta_titulo_secao("Importação de Usuários");
?>
<script language="JavaScript" src="calendar1.js"></script>
<script language="JavaScript" src="data.js"></script>
<script language="javascript">
	function valida_form(){
		var f = document.forms[0];
		if(f.nome_pessoa.value == ""){
			alert("Informe o nome da pessoa");
			return false;
		}
		if(f.usuario.value == ""){
			alert("Informe o usuario da pessoa.");
			return false;
		}
	}
</script>
<table width="100%">
	<tr>
		<td width="25%" valign="top" align="left">
			<? inicia_quadro_azul('width="100%"', "Importação"); ?>
			<div style="width: 100%; text-align:justify;">
				<img align="absmiddle" src="imagens/info.gif">
				&nbsp;Neste formul&aacute;rio &eacute; possivel importar os usuários de internet já existentes na sua empresa. Anexe um arquivo passwd.
			</div>
			<? termina_quadro_azul(); ?>
		</td>
		<td width="75%" align="center" valign="top">
			<? inicia_quadro_branco('width="100%"', "Formulário de Cadastro"); ?>
			<form action="importa_usuarios.php" encType="multipart/form-data" method="post">
			<input name="MAX_FILE_SIZE" type="hidden" value="200000000">
			<center>
				<table width="90%" border="0" cellspacing="3">
					<tr>
						<td class="label" width="30%">Arquivo:</td>
						<td>
							<input name="passwd" type="file" style="width: 100%;">
						</td>
						<td width="5%"></td>
					</tr>
					<tr>
						<td class="label" width="30%">Nível de Acesso:</td>
						<td>
							<select name="nivel">
								<option value="0">Restrito</option>
								<option value="1">Master</option>
							</select>
						</td>
						<td width="5%"></td>
					</tr>
				</table>
			</center>
			<? termina_quadro_branco(); ?>
			<br>
			<? inicia_quadro_branco('width="100%"', "Grava Informações"); ?>
			<table width="100%">
				<tr>
					<td align="right">
							<input type="reset" value="Limpar Campos" class="botao_aqua">
							&nbsp;<input type="submit" value="Salvar" class="botao_aqua">
					</td>
				</tr>
			</table>
			<? termina_quadro_branco(); ?>
			</form>
		</td>
	</tr>
</table>
<?
require("desconectar_mysql.php");
termina_pagina();
?>