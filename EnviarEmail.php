<?php

require_once 'BackEndRelatar.php';
$r = new Relatar();

if(isset($_POST['nome']) and isset($_POST['sobrenome']) and isset($_POST['escola']) and isset($_POST['cidade']) and isset($_POST['estado']) and isset($_POST['email']) and isset($_POST['relato']) and isset($_POST['atendimento'])){
	$nome = addslashes($_POST['nome']);
	$sobrenome = addslashes($_POST['sobrenome']);
	$escola = addslashes($_POST['escola']);
	$cidade = addslashes($_POST['cidade']);
	$estado = addslashes($_POST['estado']);
	$nome_agressor = addslashes($_POST['nomeagressor']);
	$email = addslashes($_POST['email']);
	$relato = addslashes($_POST['relato']);
	$atendimento = addslashes($_POST['atendimento']);
	
   $r->conexao();
   $r->registro_bullying($nome, $sobrenome, $escola, $cidade, $estado, $nome_agressor, $email, $relato, $atendimento);
}

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'antibullyingsite2021@gmail.com';
	$mail->Password = '/*sua senha do seu email*/';
	$mail->Port = 587;

	$mail->setFrom('antibullyingsite2021@gmail.com');
	$mail->addAddress('antibullyingsite2021@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'Site AntiBullying';
	$mail->Body = 
	'<pre style="font-family: Open Sans, sans-serif;">
<b>Nome: </b>'.$nome.'
<b>Sobrenome: </b>'.$sobrenome.'
<b>Escola: </b>'.$escola.'
<b>Cidade: </b>'.$cidade.'
<b>Estado: </b>'.$estado.'
<b>Nome Agressor: </b>'.$nome_agressor.'
<b>Email: </b>'.$email.'
<b>Marcar Atendimento: </b>'.$atendimento.'

<b>Relato: </b>'.$relato.'
	</pre>';
	$mail->AltBody = 'Chegou o email teste do Canal TI';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
		header('Location: relatar.html');
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}


?>