<?php
require 'phpmailer/PHPMailerAutoload.php';
require 'class.ClientList.php';
$mail = new PHPMailer;
$clientlist = new ClientList;
require 'mail_config.php';

//Contenido del correo
	$body = file_get_contents('content/newsletter.html');			//Fichero html a importar

	$mail->Username = $_REQUEST['from'];                 	// SMTP username
	$mail->Password = $_REQUEST['pass']; 
	$mail->setFrom($_REQUEST['from'], $_REQUEST['fromname']);			// Add a sender

//	$mail->addReplyTo('info@example.com', 'Information');				//Correo de replica

	$mail->Subject = $_REQUEST['subjet'];
	$mail->AltBody = $_REQUEST['altbody'];
	$mail->Body    = $body;
	
	$clientes=$clientlist->getClientesSubscritos();
	
	while($row=mysqli_fetch_array($clientes))
	{		
		$mail->addBCC($row['email']);				// Add a recipient out the list
	}
	
	//Sender
	try{
		//Comprobar envio satisfactorio
		if(!$mail->send()) {
			echo 'No se pudo enviar el mensaje al correo:'.$row['email'];
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} 
		else {
			echo 'Mensaje enviado con éxito';
		}
	}
	catch (Exception $e){
		echo 'No se puede continuar: ',  $e->getMessage(), "\n";
		}
?>