<?
require("funcoes.php");
inicia_pagina();
monta_titulo_secao("Gerênciamento de Usuários de Internet!");
?>
<table width="100%">
	<tr>
		<td width="25%">
			<? inicia_quadro_azul('width="100%"', "Usuários/Internet"); ?>
			<div style="width: 100%; text-align:justify;">
				<img align="absmiddle" src="imagens/info.gif">
				&nbsp;Seja Bemvindo ao Gerênciamento de Usuários de Internet!
			</div>
			<? termina_quadro_azul(); ?>
		</td>
		<td width="75%">
			<? inicia_quadro_branco('width="100%"', "Página Inicial"); ?>
				<center>
					<table width="90%">
						<tr height="20">
							<td colspan="3">&nbsp;</td>
						</tr>
						<tr height="50">
							<td valign="top" align="center" width="33%"><a class="menu" href="browser_pessoas.php"><img border="0" src="imagens/icone_pessoa_gr.gif"></a></td>
							<td valign="top" align="center" width="33%"><a class="menu" href="importa_usuarios.php"><img border="0" src="imagens/icone_modelo_gr.gif"></a></td>
							<td valign="top" align="center" width="33%"><a class="menu" href="sarg.php"><img border="0" src="imagens/relatorios.gif"></a></td>
							<td valign="top" align="center" width="33%"><a class="menu" href="configuracoes.php"><img border="0" src="imagens/icone_configuracao_gr.gif"></a></td>
						</tr>
						<tr height="60">
							<td valign="top" align="center"><a class="menu" href="browser_pessoas.php">Pessoas</a></td>
							<td valign="top" align="center"><a class="menu" href="importa_usuarios.php">Importa Usuários</a></td>
							<td valign="top" align="center"><a class="menu" href="sarg.php">Relatórios</a></td>
							<td valign="top" align="center"><a class="menu" href="configuracoes.php">Configura&ccedil;&otilde;es</a></td>
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