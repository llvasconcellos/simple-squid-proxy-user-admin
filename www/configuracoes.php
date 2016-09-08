<?
require("funcoes.php");
require("permissao_documento.php");

if($_POST["modo"] == "update"){
	switch($_POST["config"]){
		case "senha":
			altera_valor("senha",$_POST["senha"]);
			$msg = "Senha alterada com sucesso!";
			break;
		case "nivel_script":
			altera_valor("nivel_script",$_POST["nivel_script"]);
			$msg = "Scripts alterado com sucesso!";
			break;
	}
}
inicia_pagina();
monta_titulo_secao("Opções de Configuração");
?>
<table width="100%">
	<tr>
		<td width="25%" valign="top">
			<? inicia_quadro_azul('width="100%"', "Config"); ?>
			<div style="width: 100%; text-align:justify;">
				<img align="absmiddle" src="imagens/info.gif">
				&nbsp;Neste formul&aacute;rio &eacute; possivel alterar as configura&ccedil;&otilde;es essenciais para o funcionamento do sistema.
			</div>
			<? termina_quadro_azul(); ?>
		</td>
		<td width="75%">
			<? inicia_quadro_branco('width="100%"', "Pagina Inicial"); 
				if($_POST["modo"] == "update") echo('<span style="color: #FF0000; font-weight: bold;">' . $msg . '</span><br><br>'); ?>
				
					<span class="celula"><B>Senha de Administrador</B></span><br><br>
					<script language="javascript">
						function confirma_senha(){
							var f = document.forms[0];
							if(f.senha.value != f.confirma.value){
								alert('A senha no confere.');
								return false;
							}
							else return true;
						}
					</script>
					<center>
						<table width="80%">
							<tr>
								<td>
									<fieldset>
									<legend class="celula"><B>Senha de Administrador</B></legend>
									<table width="100%" cellpadding="2" cellspacing="2">
										<form onSubmit="return confirma_senha();" action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
										<tr>
											<td align="right" width="25%">Senha:</td>
											<td><input type="password" name="senha" maxlength="30" class="input_text"></td>
										</tr>
										<tr>
											<td align="right">Confirma Senha:</td>
											<td><input type="password" name="confirma" maxlength="30" class="input_text"></td>
										</tr>
										<tr>
											<td></td>
											<td align="right"><input type="reset" value="Cancelar" class="botao_aqua">&nbsp;<input type="submit" value="Salvar" class="botao_aqua"></td>
										</tr>
										<input type="hidden" name="config" value="senha">
										<input type="hidden" name="modo" value="update">
										</form>
									</table>
									</fieldset>
									<br><br>
									<!--<fieldset>
										<legend class="celula"><B>Nveis de Acesso/Script</B></legend>
										<table width="100%" cellpadding="2" cellspacing="2">
											<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
											<tr>
												<td align="right" width="10%">Email:</td>
												<td><textarea name="nivel_script"class="input_text" rows="5" style="background-image:url();"><?=retorna_config("nivel_script")?></textarea></td>
											</tr>
											<tr>
												<td></td>
												<td align="right"><input type="reset" value="Cancelar" class="botao_aqua">&nbsp;<input type="submit" value="Salvar" class="botao_aqua"></td>
											</tr>
											<input type="hidden" name="config" value="nivel_script">
											<input type="hidden" name="modo" value="update">
											</form>
										</table>
									</fieldset>
									<br><br>-->
								</td>
							</tr>
						</table>
					</center>
			<? termina_quadro_branco(); ?>
		</td>
	</tr>
</table>
<?
termina_pagina();
?>