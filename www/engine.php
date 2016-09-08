<?
require("funcoes.php");
require("conectar_mysql.php");
$query = "SELECT * FROM usuarios WHERE expiracao <= NOW()";
$result = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error(), false);
while($registro = mysql_fetch_assoc($result)){
	if($registro["nivel"] == 0){
		$query = "DELETE FROM usuarios WHERE cd=" . $registro["cd"];
		$result2 = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error());
		apaga_usuario_restrito($registro["usuario"]);
	}
	elseif($registro["nivel"] == 1){
		$query = "DELETE FROM usuarios WHERE cd=" . $registro["cd"];
		$result2 = mysql_query($query) or tela_erro("Erro de conexo ao banco de dados: " . mysql_error());
		apaga_usuario_master($registro["usuario"]);
	}
}
require("desconectar_mysql.php");
?>