<?
error_reporting(E_ERROR | E_PARSE);
//error_reporting(E_ALL);
function inicia_pagina(){
	require("permissao_documento.php");
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
		<head>
			<title>Ger&ecirc;nciamento de Usu&aacute;rios de Internet</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link href="estilo.css" rel="stylesheet" rev="stylesheet">
			<script language="JavaScript" src="menu.js"></script>
			<script defer type="text/javascript" src="pngfix.js"></script>
			<script language="javascript">
				var engwindow;
				var i;
				function engine(){
					if(confirm("Deseja enviar todas as malas diretas para todos os segmentos cadastrados? Serão enviadas apenas as malas agendadas para o dia de hoje.")){
						engwindow = window.open("engine.php", "engwindow");
						i = setInterval(monitora_engine, 1000);	
					}
				}
				function monitora_engine(){
					if(engwindow.document.readyState == "complete"){
						alert("Envio Terminado!");
						clearInterval(i);
						engwindow.close();
					}
				}
			</script>
		</head>
		<body>
			<div style="position:absolute; top:0px; left:0px;"><img src="imagens/logo.png"></div>
			<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0">
				<tr>
					<td colspan="3"><img src="imagens/cabecalho.jpg"></td>
					<td background="imagens/extensao_cabecalho.jpg">&nbsp;</td>
				</tr>
				<tr>
					<td width="330" height="30" background="imagens/rodape_cabecalho_1.gif">&nbsp;</td>
					<td width="44" background="imagens/rodape_cabecalho_2.jpg">&nbsp;</td>
					<td width="376" background="imagens/rodape_cabecalho_3.gif">
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td align="center" width="100"><a class="menu_horizontal" href="browser_pessoas.php">Usuários</a></td>
								<td align="center"><img src="imagens/divisor.gif"></td>
								<td align="center" width="100"><a class="menu_horizontal" href="sarg.php">Relatórios</a></td>
								<td align="center"><img src="imagens/divisor.gif"></td>
								<td align="center" width="100"><a class="menu_horizontal" href="importa_usuarios.php">Importação</a></td>
								<td align="center"><img src="imagens/divisor.gif"></td>
								<td align="center" width="100"><a class="menu_horizontal" href="form_blacklist.php">BlackList</a></td>
								<td align="center"><img src="imagens/divisor.gif"></td>
								<td align="center" width="100"><a class="menu_horizontal" href="configuracoes.php">Configurações</a></td>
								<td align="center" width="50">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="5" height="5"></td> 
							</tr>
						</table>
					</td>
					<td background="imagens/rodape_cabecalho_3.gif">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3" width="750">
	<?
}

######################################################################################################################################

function termina_pagina(){
	?>
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3" height="46" background="imagens/rodape.jpg" align="center">
						<br>
						<a href="mailto:sandro@sintetic.com.br">Sandro da Silva</a> - <span style="font-family:wingdings;">(</span>&nbsp;(47) 9974-8227<br>
						Desenvolvido por Sintetic Systems LTDA. &copy; Todos os Direitos Reservados.
					</td>
					<td height="46" background="imagens/rodape.jpg">&nbsp;</td>
				</tr>
			</table>
		</body>
	</html>
	<?
}

######################################################################################################################################

function inicia_quadro_branco($parametros,$titulo){
	?>
	<table cellpadding="0" cellspacing="0" border="0" <?=$parametros?>>
		<tr>
			<td width="30" height="28" background="imagens/canto_sup_esq_quadro_branco.gif"></td>
			<td background="imagens/lateral_sup_quadro_branco.gif" valign="top">
				<span style="font-size:9px;">&nbsp;</span><br>
				<?=$titulo?>
			</td>
			<td width="29" background="imagens/canto_sup_dir_quadro_branco.gif"></td>
		</tr>
		<tr>
			<td width="30" background="imagens/lateral_esq_quadro_branco.gif"></td>
			<td bgcolor="#FFFFFF">
	<?
}

######################################################################################################################################

function termina_quadro_branco(){
	?>
			</td>
			<td width="29" background="imagens/lateral_dir_quadro_branco.gif"></td>
		</tr>
		<tr>
			<td width="30" height="27" background="imagens/canto_inf_esq_quadro_branco.gif"></td>
			<td background="imagens/lateral_inf_quadro_branco.gif"></td>
			<td width="29" height="27" background="imagens/canto_inf_dir_quadro_branco.gif"></td>
		</tr>
	</table>
	<?
}

######################################################################################################################################

function inicia_quadro_azul($parametros,$titulo){
	?>
	<table cellpadding="0" cellspacing="0" border="0" <?=$parametros?>>
		<tr>
			<td width="30" height="48" background="imagens/canto_sup_esq_quadro_azul.gif"></td>
			<td background="imagens/lateral_sup_quadro_azul.gif" valign="top">
				<div style="width:100%; height: 23px;">&nbsp;</div>
				<?=$titulo?>
			</td>
			<td width="29" background="imagens/canto_sup_dir_quadro_azul.gif"></td>
		</tr>
		<tr>
			<td width="30" background="imagens/lateral_esq_quadro_azul.gif"></td>
			<td bgcolor="#FFFFFF">
	<?
}

######################################################################################################################################

function termina_quadro_azul(){
	?>
			</td>
			<td width="29" background="imagens/lateral_dir_quadro_azul.gif"></td>
		</tr>
		<tr>
			<td width="30" height="90" background="imagens/canto_inf_esq_quadro_azul.jpg"></td>
			<td background="imagens/lateral_inf_quadro_azul.jpg"></td>
			<td width="29" height="90" background="imagens/canto_inf_dir_quadro_azul.jpg"></td>
		</tr>
	</table>
	<?
}

#######################################################################################################################

function altera_valor($chave, $valor){
	require("conectar_mysql.php");
	$query = "UPDATE config SET valor='" . $valor . "' WHERE chave='" . $chave . "'";
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
	require("desconectar_mysql.php");
}
function retorna_config($chave){
	require("conectar_mysql.php");
	$query = "SELECT valor FROM config WHERE chave='" . $chave . "'";
	$result = mysql_query($query) or die("Erro de conexão ao banco de dados: " . mysql_error());
	$valor = mysql_fetch_assoc($result);
	return $valor["valor"];
	require("desconectar_mysql.php");
}

#######################################################################################################################

function inicia_pagina_sem_menu(){
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
		<head>
			<title>Ger&ecirc;nciamento de Usu&aacute;rios de Internet</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link href="estilo.css" rel="stylesheet" rev="stylesheet">
			<script defer type="text/javascript" src="pngfix.js"></script>
		</head>
		<body>
			<div style="position:absolute; top:0px; left:0px;"><img src="imagens/logo.png"></div>
			<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0">
				<tr>
					<td colspan="3"><img src="imagens/cabecalho.jpg"></td>
					<td background="imagens/extensao_cabecalho.jpg">&nbsp;</td>
				</tr>
				<tr>
					<td width="330" height="30" background="imagens/rodape_cabecalho_1.gif">&nbsp;</td>
					<td width="44" background="imagens/rodape_cabecalho_2.jpg">&nbsp;</td>
					<td width="376" background="imagens/rodape_cabecalho_3.gif">&nbsp;</td>
					<td background="imagens/rodape_cabecalho_3.gif">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="3" width="750">
	<?
}

#######################################################################################################################

function saida(){
	?>
	<html>
		<head>
			<title>SUCESSO!</title>
			<script language="javascript">
				opener.location.reload();
				self.close();
			</script>
		</head>
		<body></body>
	</html>
	<?
}

#########################################################################################################################

function tela_erro($mensagem, $tela_pq){
	if($tela_pq) inicia_pagina_sem_cabec();
	else inicia_pagina();

	if(!$tela_pq) monta_titulo_secao("Erro ao processar informações!");
	echo('<center>');
	inicia_quadro_branco('width="500"', 'Atenção!'); ?>
			<table width="100%">
				<tr>
					<td><img src="imagens/atencao.jpg"></td>
					<td class="conteudo_quadro_branco"><?=$mensagem?></td>
				</tr>
				<?	if($tela_pq) echo('<tr><td class="conteudo_quadro_branco" colspan="2" align="right">[<a href="javascript: self.close();">FECHAR</a>]</td></tr>'); ?>
			</table>
	<?
	termina_quadro_branco();
	echo('</center>');
	termina_pagina();
	if($tela_pq){ ?>
		<script language="javascript">
			self.resizeTo(600, 260);
		</script>
	<? }
	die();
}

######################################################################################################################################

function inicia_pagina_sem_cabec(){
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
		<head>
			<title>Re@cher WebMailer</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link href="estilo.css" rel="stylesheet" rev="stylesheet">
		</head>
		<body>
			<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" border="0">
				<tr>
					<td width="750"><img src="imagens/logo_branco.gif"></td>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td height="20" background="imagens/linha_azul.gif">&nbsp;</td>
					<td colspan="3" height="20" background="imagens/linha_azul.gif">&nbsp;</td>
				</tr>
				<tr>
					<td>
	<?
}

######################################################################################################################################

function monta_titulo_secao($titulo){
	?>
	<table width="100%" border="0">
		<tr>
			<td width="10">&nbsp;</td>
			<td width="50"><a href="#" onClick="window.history.back();"><img title="Voltar" border="0" src="imagens/voltar.gif"></a></td>
			<td width="10">&nbsp;</td>
			<td align="left" valign="top">
				<div style="font-family: Arial; font-size: 16px; font-weight: bold; position: absolute; color:#CCCCCC; z-index: 0; margin-top: 7px; margin-left: 2px;"><?=$titulo?></div>
				<div style="font-family: Arial; font-size: 16px; font-weight: bold; position: absolute; color:#0057F4; z-index:1000; margin-top: 5px; margin-left: 0px;"><?=$titulo?></div>
			</td>
			<td width="30"><a href="home.php"><img title="Pagina Inicial" border="0" src="imagens/home.gif"></a></td>
			<td width="22"><a href="logout.php"><img title="Sair do Sistema" border="0" src="imagens/logout.gif"></a></td>
		</tr>
	</table>
	<hr>
	<br><br>
	<?
}

#########################################################################################################################

function tela_ok($mensagem, $url){
	inicia_pagina();
	monta_titulo_secao("Informações processadas com sucesso!");
	echo('<center>');
	inicia_quadro_branco('width="500"', 'Atenção!');
	?>
	<table width="100%">
		<tr>
			<td width="110"><img src="imagens/ok.jpg"></td>
			<td class="conteudo_quadro_branco"><?=$mensagem?></td>
		</tr>
	</table>
	<script language="javascript">
		window.setTimeout('self.location = "<?=$url?>";',2000);
	</script>
	<?
	termina_quadro_branco();
	echo('</center>');
	termina_pagina();
	die();
}

######################################################################################################################################

function browser($query, $colunas, $string, $titulo, $num_registro_pagina, $organizar_default, $link_cabec_tabela){
	$busca = $_REQUEST["busca"];
	if(empty($_REQUEST["organizar"])) $organizar = $colunas[$organizar_default]['campo'];
	else $organizar = $_REQUEST["organizar"];
	$script = $_SERVER['PHP_SELF'];
	
	if(empty($_REQUEST["sentido"])) $sentido = "ASC";
	else $sentido = $_REQUEST["sentido"];
	
	if($sentido == "ASC") $novo_sentido = "DESC";
	else $novo_sentido = "ASC";
		
	$ordem = " ORDER BY " . $organizar .  " " . $sentido;	
	inicia_quadro_branco('width="100%"', $titulo); ?>
		<BR>
		<table width="100%" class="conteudo_quadro_claro" border="0" cellpadding="2" cellspacing="0">
			<tr style="background-color:#A6C1DC;">
				<?
				for($i = 0; $i < count($colunas); $i++){ ?>
					<td width="<?=$colunas[$i]['largura']?>" align="<?=$colunas[$i]['alinhamento']?>">
						<?
						if((strlen($colunas[$i]['campo'])>0) && ($link_cabec_tabela)){
							echo('<a class="cabec_tabela_browser"');
							if($organizar == $colunas[$i]['campo']) echo(' style="color: #00FFFF;"');
							echo(' href="' . $script . '?organizar=' . $colunas[$i]['campo'] . '&sentido=' . $novo_sentido . "&busca=" . $busca . '">');
							echo($colunas[$i]['label'] . "&nbsp;");
							if($organizar == $colunas[$i]['campo']){
								if($sentido == "ASC") echo('<img border="0" align="absmiddle" src="imagens/sentido_asc.gif">');
								else echo('<img border="0" align="absmiddle" src="imagens/sentido_desc.gif">');
							}
							echo('</a>');
						}
						else echo('<span class="cabec_tabela_browser">' . $colunas[$i]['label'] . '</span>');
						?>
					</td>
				<? } ?>
			</tr>
			<tr>
				<td colspan="<?=count($colunas);?>">&nbsp;</td>
			</tr>
			<?
			if(!isset($num_registro_pagina)) $num_registro_pagina = 15;
			
			if(strlen($_GET["pagina"]) == 0) $pagina = 1;
			else $pagina = $_GET["pagina"];
			
			$limite = ($num_registro_pagina * ($pagina -1));
			$query_limit = " LIMIT " . $limite . "," . $num_registro_pagina;
			
			require("conectar_mysql.php");
		
			$result = mysql_query($query) or tela_erro("Erro de conexão ao banco de dados: " . mysql_error(), false);
			$quantidade = mysql_num_rows($result);
			
			$query .= $ordem . $query_limit;
			$result = mysql_query($query) or tela_erro("Erro de conexão ao banco de dados: " . mysql_error(), false);
			if(mysql_num_rows($result) == 0) echo('<tr><td colspan="' . count($colunas) . '">Nenhum Registro Encontrado</td></tr>');
			$j = 0;
	
			while($registro = mysql_fetch_row($result)){
				if($j == 0){ 
					?>
					<tr style="background-color: #E6EDF7;" onMouseOver="this.style.backgroundColor = '#BACAEB';" onMouseOut="this.style.backgroundColor = '#E6EDF7';">
					<?
					$j = 1;
				}
				else{
					?>
					<tr onMouseOver="this.style.backgroundColor = '#BACAEB';" onMouseOut="this.style.backgroundColor = '';">
					<?
					$j = 0;
				}
				for($i = 0; $i < count($registro); $i++){
					echo('<td align="' . $colunas[$i]['alinhamento'] . '" valign="top">' . $registro[$i] . '</td>');
				}
				echo("</tr>");
			}
			require("desconectar_mysql.php");
			?>
		</table>
		<br>
		<div style="width: 100%; text-align: center;">
			<? make_user_page_nums($quantidade, $string, $script , $num_registro_pagina, $pagina, 10); ?>
		</div>
	<? termina_quadro_branco(); 
}

############################################################################################################################

function make_user_page_nums($total_results, $print_query, $page_name, $results_per_page, $page, $max_pages_to_show) {
	
	/* PREV LINK: print a Prev link, if the page number is not 1 */
	if($page != 1) {
		$pageprev = $page - 1;
		echo '<a href="' . $page_name . '?pagina=' . $pageprev . $print_query . '"><img align="absmiddle" title="Voltar" border="0" src="imagens/voltar2.gif"></a> ';
	}
	
	/* get the total number of pages that are needed */
	
	$showpages = round($max_pages_to_show/2);
	$numofpages = $total_results/$results_per_page;
	
	if ($numofpages > $showpages ) { 
		$startpage = $page - $showpages ;
	}
	else { 
		$startpage = 0; 
	}
	
	if ($startpage < 0){
		$startpage = 0; 
	}
	
	if ($numofpages > $showpages ) {
		$endpage = $page + $showpages; 
	}
	else { 
		$endpage = $showpages; 
	}
	
	if ($endpage > $numofpages){ 
		$endpage = $numofpages; 
	}
	
	/* loop through the page numbers and print them out */
	for($i = $startpage; $i < $endpage; $i++) {
		/* if the page number in the loop is not the same as the page were on, make it a link */
		$real_page = $i + 1;
		if ($real_page!=$page){
			echo " <a class=\"menu\" href=\"".$page_name."?pagina=".$real_page.$print_query."\">".$real_page."</a> ";
			/* otherwise, if the loop page number is the same as the page were on, do not make it a link, but rather just print it out */
		}
		else {
			if($page != 1) echo "<b class=\"menu\" style=\"color: #FF0000;\">".$real_page."</b>";
			elseif($page < $numofpages) echo "<b class=\"menu\" style=\"color: #FF0000;\">".$real_page."</b>";
		}
	}
	
	/* NEXT LINK -If the totalrows - $results_per_page * $page is > 0 (meaning there is a remainder), print the Next button. */
	if(($total_results-($results_per_page*$page)) > 0){
		$pagenext = $page + 1;
		echo ' <a href="' . $page_name . '?pagina=' . $pagenext . $print_query . '"><img align="absmiddle" title="Avançar" border="0" src="imagens/avancar.gif"></a>';
	}
}

############################################################################################################################

function mostra_familias(){
	require("conectar_mysql.php");
	$query = "SELECT * FROM familias WHERE inclui_mala_direta = 's' ORDER BY ordem";
	$result = mysql_query($query) or die($query . "Erro de conexão ao banco de dados: " . mysql_error());
	$ENTER = chr(10);
	$HTML = '<table cellpadding="1" cellspacing="1" border="1">' . $ENTER;

	$i = 0;
	while($familia = mysql_fetch_assoc($result)){
		$query = "SELECT * FROM subfamilia WHERE familia=" . $familia["cd"] . " ORDER BY rand() LIMIT 1";
		$result2 = mysql_query($query) or die($query . "Erro de conexão ao banco de dados: " . mysql_error());
		$subfamilia = mysql_fetch_assoc($result2);
		if($i == 0) $HTML .= '<tr>' . $ENTER;
		$HTML .= '<TD valign="middle" align="center" width="150">' . $ENTER;
			$HTML .= '<A href="http://www.ldi.com.br/produtos.php?familia=' . $familia["cd"] . '">' . $ENTER;
				$HTML .= '<IMG align="left" style="margin: 10px;" height="46" src="http://www.ldi.com.br/' . $subfamilia["imagem_thumb"] . '" border="0">' . $ENTER;
				$HTML .= '<FONT face="Tahoma, sans-serif" style="FONT-SIZE: 9pt" size="2">' . $ENTER;
				$HTML .= $familia["titulo_mala_direta"] . $ENTER;
				$HTML .= '</FONT>' . $ENTER;
			$HTML .= '</A>' . $ENTER;
		$HTML .= '</TD>' . $ENTER;
		$i++;
		if($i == 3){
			$HTML .= '</tr>' . $ENTER;
			$i = 0;
		}
	}
	$HTML .= '</table>' . $ENTER;
	require("desconectar_mysql.php");
	return $HTML;
}


function cria_usuario_master($usuario, $senha){
	system('htpasswd -b /etc/squid/regras/passwd ' . $usuario . ' ' . $senha);
	system('echo "' . $usuario . '" >> /etc/squid/regras/master.txt');
	system('squid -k reconfigure');
}

function cria_usuario_pleno($usuario, $senha){
	system('htpasswd -b /etc/squid/regras/passwd ' . $usuario . ' ' . $senha);
	system('echo "' . $usuario . '" >> /etc/squid/regras/pleno.txt');
	system('squid -k reconfigure');
}

function cria_usuario_restrito($usuario, $senha){
	system('htpasswd -b /etc/squid/regras/passwd ' . $usuario . ' ' . $senha);
	system('echo "' . $usuario . '" >> /etc/squid/regras/usuarios.txt');
	system('squid -k reconfigure');
}

function apaga_usuario_master($usuario){
	system('htpasswd -D /etc/squid/regras/passwd ' . $usuario);
	system('sed -i "/' . $usuario . '/Id" /etc/squid/regras/master.txt');
	system('squid -k reconfigure');
}

function apaga_usuario_pleno($usuario){
	system('htpasswd -D /etc/squid/regras/passwd ' . $usuario);
	system('sed -i "/' . $usuario . '/Id" /etc/squid/regras/pleno.txt');
	system('squid -k reconfigure');
}

function apaga_usuario_restrito($usuario){
	system('htpasswd -D /etc/squid/regras/passwd ' . $usuario);
	system('sed -i "/' . $usuario . '/Id" /etc/squid/regras/usuarios.txt');
	system('squid -k reconfigure');
}

/*
function update_restrito_master($usuario, $senha){
	system('htpasswd -b /etc/squid/regras/passwd ' . $usuario . ' ' . $senha);
	system('echo "' . $usuario . '" >> /etc/squid/regras/master.txt');
	system('squid -k reconfigure');
}

function update_master_restrito($usuario, $senha){
	system('htpasswd -b /etc/squid/regras/passwd ' . $usuario . ' ' . $senha);
	system('sed -i "/' . $usuario . '/Id" /etc/squid/regras/master.txt');
	system('squid -k reconfigure');
}
*/
?>