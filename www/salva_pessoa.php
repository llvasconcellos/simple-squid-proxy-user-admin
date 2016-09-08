<?
require("funcoes.php");
require("permissao_documento.php");
require("conectar_mysql.php");

$modo = $_REQUEST["modo"];
$cd = $_REQUEST["cd"];
$nome = $_REQUEST["nome"];
$usuario = $_REQUEST["usuario"];
$senha = $_REQUEST["senha"];
$nivel = $_REQUEST["nivel"];
$expiracao = $_REQUEST["expiracao"];

$expiracao = split(" ", $expiracao);
$data = $expiracao["0"];
$data = split("/", $data);
$hora = $expiracao["1"];
$expiracao = "'" . $data[2] . "-" . $data[1] . "-" . $data[0] . " " . $hora . "'";


if($modo == "apagar"){
	$query = "SELECT usuario, nivel FROM usuarios WHERE cd=" . $cd;
	$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error(), false);
	$registro = mysql_fetch_assoc($result);

	if($registro["nivel"] == 0){
		apaga_usuario_restrito($registro["usuario"]);
	}
	elseif($registro["nivel"] == 1){
		apaga_usuario_master($registro["usuario"]);
	}
	elseif($registro["nivel"] == 2){
		apaga_usuario_pleno($registro["usuario"]);
	}
	
	$query = "DELETE FROM usuarios WHERE cd=" . $cd;
	$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error());
	
	$mensagem = "Usuário removido com sucesso!";
	$url = "browser_pessoas.php";
	if($result) tela_ok($mensagem, $url);
	die();
}


if($modo == "add"){
	$query = "SELECT usuario FROM usuarios WHERE usuario='" . $usuario . "'";
	$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error(), false);
	if(mysql_num_rows($result)>0) tela_erro("Já existe este usuário cadastrado.", false);
	else{
		$query = "INSERT INTO usuarios (nome, usuario, senha, nivel, expiracao) VALUES ";
		$query .= "('" . $nome ."',";
		$query .= "'" . $usuario ."',";
		$query .= "'" . $senha ."',";
		$query .= "'" . $nivel ."',";
		$query .= $expiracao .")";
		$result = mysql_query($query) or tela_erro("Erro ao atualizar registros no Banco de dados: " . mysql_error(), false);
		$result = mysql_query("SELECT LAST_INSERT_ID();") or tela_erro("Erro ao atualizar registros no Banco de dados: " . mysql_error(), false);
		$registro = mysql_fetch_row($result);
		$cd = $registro[0];
		$url = "form_pessoa.php?modo=update&cd=" . $cd;
		$mensagem = "Usuário cadastrado com sucesso!";
		
		if($nivel == 0){
			cria_usuario_restrito($usuario, $senha);
		}
		elseif($nivel == 1){
			cria_usuario_master($usuario, $senha);
		}
		elseif($nivel == 2){
			cria_usuario_pleno($usuario, $senha);
		}
	}
}
if($modo == "update"){
	$query = "SELECT usuario FROM usuarios WHERE usuario='" . $usuario . "'";
	$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error(), false);
	$registro = mysql_fetch_assoc($result);
	$nivel_antigo = $registro["nivel"];
	
	$query = "UPDATE usuarios SET ";
	$query .= "nome='" . $nome . "', ";
	$query .= "usuario='" . $usuario . "', ";
	$query .= "senha='" . $senha . "', ";
	$query .= "nivel='" . $nivel . "', ";
	$query .= "expiracao=" . $expiracao;
	$query .= " WHERE cd=" . $cd;
	$mensagem = "Informações alteradas com sucesso!";
	$url = "form_pessoa.php?modo=update&cd=" . $cd;
	$result = mysql_query($query) or tela_erro("Erro ao atualizar registros no Banco de dados: " . mysql_error(), false);
	
	if($nivel_antigo == 0){
		apaga_usuario_restrito($usuario);
	}
	elseif($nivel_antigo == 1){
		apaga_usuario_master($usuario);
	}
	elseif($nivel_antigo == 2){
		apaga_usuario_pleno($usuario);
	}
	
	if($nivel == 0){
		cria_usuario_restrito($usuario, $senha);
	}
	elseif($nivel == 1){
		cria_usuario_master($usuario, $senha);
	}
	elseif($nivel == 2){
		cria_usuario_pleno($usuario, $senha);
	}
}
if($result) tela_ok($mensagem, $url);

require("desconectar_mysql.php");
?>