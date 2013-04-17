<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Projeto PS</title>
</head>
<?php
$page = "app";
if (isset($_GET["page"])){
	$page = $_GET["page"];
}
?>
			<!--IMPORTA ARQUIVO CSS -->
<style>
@import "css/css.css";
</style>
<body>
<p id="hora"></p>
<p id="data"></p>
<script>
	exibeHora();
        function exibeHora(){
        var data = new Date();
        document.getElementById("hora").innerHTML = data.getHours()+":"+data.g$
        setTimeout("exibeHora()" 1000);
        }
	exibeData();
        function exibeData(){
        var data = new Date();
        documento.getElementById("data").innetHTML = data.getDate()+"/"+(data.$
        }
	</script>
			<!--MENU DA APLICAÇÃO-->
	<div id="menu">
            <tr>
            	<td><a href="index.php">Home</a></td>
            	<td <?=($page=="app")?"class='active'":""?>><a href='<?=$_SERVER['PHP_SELF']?>?page=app'><span>Aplicação</span></a></td>
            </tr>
    </div>
			<!--CHAMA APLICAÇÃO-->
    <div id="apli">
	<?if(@$_GET["page"] == "app")
	include "app.php";?>
    </div>
			<!--CHAMA MENU-->
    <div id="menuap">
    	<?if(@$_GET["page"] == "apm")
	include "menu.php";?>
    </div>
</body>
</html>
