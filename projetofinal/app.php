<?
//Variavel nao for vazia faça:
if (isset($_POST["iip"]) or isset($_POST["fip"])){
$tiip = strlen($_POST["iip"]);
$tfip = strlen($_POST["fip"]);

//Testa tamanho do input.
if ($tiip < 7 ){
echo "<script> alert ('IP inicial invalido digite novamente.')</script>";
}

//Testa tamanho do input.
else if ($tfip <7){
echo "<script> alert ('IP final invalido digite novamente.')</script>";
}

//Passou do teste faça:
else{

//Verifica faixa de IP's.
$exec = shell_exec("fping -g ".$_POST["iip"]." ".$_POST["fip"]);

//Armazena apenas IP's online.
$aray = explode("is alive",$exec);

//Pega variavel para jogar no Menu.
echo "<form action='index.php?page=apm' method='post'>";
//Varre o array
foreach ($aray as $chave => $value){

//Verifica o tamanho dos valores
	if (strlen("$value")<15){

//Se for menor que 15 faça:
		echo "<input type='submit' value='".$value."' name='pegip'><br>";
	}
}
echo "<form><br>";
 }
}
?>
			<!--Digita faixa de ip-->
<form action="<?=$_SERVER['PHP_SELF']?>?page=app" method="post">
<input type="hidden" name="page" value="asp">
ip inicial: <input type="text" size="12" maxlength="15" name="iip">
ip final: <input type="text" size="12" maxlength="15" name="fip">
<input type="submit" value="Enviar">
</form>


