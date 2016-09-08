<?
require("funcoes.php");
inicia_pagina();
monta_titulo_secao("Usuários Cadastrados");

$busca = $_REQUEST["busca"];
$organizar = $_REQUEST["organizar"];
$script = $_SERVER['PHP_SELF'];

inicia_quadro_branco('width="100%"', ''); ?>
	<table width="100%" cellpadding="2" cellspacing="2" border="0">
		<form action="<?=$script?>" method="post">
		<tr>
			<td width="70" align="center">
				<a title="Clique para adicionar uma nova pessoa" href="form_pessoa.php">
					<img border="0" align="absmiddle" src="imagens/icone_pessoa_mais.gif">
				</a>
				<br>
				<span style="font-size:9px;">Novo Usuário</span>
			</td>
			<td width="100" class="label">Busca:</td>
			<td width="200"><input type="text" name="busca" class="input_text" value="<?=$busca?>"></td>
			<td width="100">
				<select name="organizar">
					<option value="nome"<? if($organizar == "nome") echo(" selected"); ?>>Nome</option>
					<option value="usuario"<? if($organizar == "usuario") echo(" selected"); ?>>Usuário</option>
				</select>
			</td>
			<td width="20"><input type="image" src="imagens/lupa.gif"></td>
			<td>&nbsp;</td>
		</tr>
		</form>
	</table>
<? termina_quadro_branco();

$query = "SELECT ";
$query .= " CONCAT('<a title=\"Editar\" href=\"form_pessoa.php?modo=update&cd=', cd , '\"><img border=\"0\" src=\"imagens/editar.gif\"></a>') as editar,";
$query .= " CONCAT('<a title=\"Copiar\" href=\"form_pessoa.php?modo=copiar&cd=', cd , '\"><img border=\"0\" src=\"imagens/copiar.gif\"></a>') as copiar,";
$query .= "usuario, nome, DATE_FORMAT(expiracao,'%d/%m/%Y %H:%i:%s') as expiracao, ";
$query .= "CASE nivel WHEN 0 THEN 'Restrito' WHEN 1 THEN 'Master' WHEN 2 THEN 'Pleno' ELSE 'Indefinido' END, ";
$query .= "CONCAT('<a href=\"javascript: apagar(', cd , ');\"><img border=\"0\" src=\"imagens/lixeira.gif\"></a>')";
$query .= " from usuarios";

if(!empty($busca)) {
	if($organizar == "nome"){
		$query .= " WHERE nome LIKE '%" . trim($busca) . "%'";
		$string = "&busca=" .  $busca . "&organizar=nome";
	}
	if($organizar == "usuario"){
		$query .= " WHERE usuario LIKE '%" . trim($busca) . "%'";
		$string = "&busca=" .  $busca . "&organizar=usuario";
	}
}

$colunas[0]['largura'] = "3%";
$colunas[0]['label'] = "&nbsp;";
$colunas[0]['campo'] = "";
$colunas[0]['alinhamento'] = "left";

$colunas[1]['largura'] = "5%";
$colunas[1]['label'] = "&nbsp;";
$colunas[1]['campo'] = "";
$colunas[1]['alinhamento'] = "left";

$colunas[2]['largura'] = "15%";
$colunas[2]['label'] = 'Usuário';
$colunas[2]['campo'] .= 'usuario';
$colunas[2]['alinhamento'] = "left";

$colunas[3]['largura'] = "25%";
$colunas[3]['label'] = 'Nome';
$colunas[3]['campo'] = 'nome';
$colunas[3]['alinhamento'] = "left";

$colunas[4]['largura'] = "16%";
$colunas[4]['label'] = 'Expiração';
$colunas[4]['campo'] = "expiracao";
$colunas[4]['alinhamento'] = "center";

$colunas[5]['largura'] = "16%";
$colunas[5]['label'] = 'Nível';
$colunas[5]['campo'] = "nivel";
$colunas[5]['alinhamento'] = "center";

$colunas[6]['largura'] = "4%";
$colunas[6]['label'] = "&nbsp;";
$colunas[6]['campo'] = "";
$colunas[6]['alinhamento'] = "right";
?>
<script language="javascript">
	function apagar(id){
		if(confirm("Deseja remover este usuário do sistema?"))
			window.location = 'salva_pessoa.php?modo=apagar&cd=' + id + '<?=$string?>';
	}
</script>
<? browser($query, $colunas, $string, '', 20, 2, true); ?>
<script language="javascript">
	document.forms[0].elements[0].focus();
</script>
<? termina_pagina(); ?>
