<?
if (isset($_POST['oop'])){ //verifica variavel do arquivo app
if (isset($_POST["op"])){ //verifica variavel op
if ($_POST["op"]=="ifconfig"){ //se variavel op receber ifconfig faça:
if($ssh = ssh2_connect($_POST['oop'], '22')){ //acesso remoto no ip
        echo "O computador remoto esta disponivel";
}
else
{
        echo "Acesso Negado";
}
if(ssh2_auth_password ($ssh, 'root', '12364')){ //conta de root para acessa ssh
echo "<br />Logado com sucesso!<br />";
}
	$com = "/sbin/ifconfig"; //variavel q recebe comando
	$stream = ssh2_exec($ssh, $com); //comando executado
	stream_set_blocking ($stream, true);
	$data = '';
	while($buffer = fread($stream, 4096)){
	$data .= $buffer;
	}
	fclose($stream);
	echo "<pre>".$data; //mostra o comando
}
else if ($_POST["op"]=="ping"){ //se variavel op receber ping faça:
if($ssh = ssh2_connect($_POST['oop'], '22')){ //acesso remoto
        echo "O computador remoto esta disponivel";
	}
else
{
        echo "Acesso Negado";
	}
if(ssh2_auth_password ($ssh, 'root', '12364')){ //usuario root para acesso ssh
	echo "<br />Logado com sucesso!<br />";
	}
	$com = "ping -c 3 8.8.8.8";// comando recebe ping automatico
	$stream = ssh2_exec($ssh, $com); //via ssh faça o comando
        stream_set_blocking ($stream, true);
        $data = '';
        while($buffer = fread($stream, 4096)){
        $data .= $buffer;
        }
        fclose($stream);
        echo "<pre>".$data; //mostra o comando na pagina index
}
}//fecha verificação da variavel op
}//fecha verificação da variavel oop
?>
			<!--Menu de comandos-->
<form action="<?=$_SERVER['PHP_SELF']?>?page=apm" method="post">
<input type="hidden" value="<?=$_POST['pegip']?>?page=apm" name="oop">
<input type="hidden" value="vazio" name="op">
<input type="radio" value="ifconfig" name="op">Ifconfig<br>
<input type="radio" value="ping" name="op">Ping<br>
<input type="submit" value="Enviar">
</form>
