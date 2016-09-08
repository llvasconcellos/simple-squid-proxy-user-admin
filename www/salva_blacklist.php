<?
require("funcoes.php");
require("permissao_documento.php");

if (!function_exists('file_put_contents'))
{
   function file_put_contents($filename, $data)
   {
      $f = @fopen($filename, 'w');
      if (!$f)
      {
         return false;
      }
      else
      {
         $bytes = fwrite($f, $data);
         fclose($f);
         return $bytes;
      }
   }
}


$blacklist = $_REQUEST["blacklist"];
$arquivo_blacklist = $_REQUEST["arquivo_blacklist"];

if(file_put_contents($arquivo_blacklist, $blacklist))
	tela_ok("Arquivo de BlackList gravado com sucesso!", "form_blacklist.php");
else
	tela_erro("Erro ao gravar arquivo de blacklist: " . $arquivo_blacklist, false);
	
?>