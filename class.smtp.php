<?php
require 'phpmailer/PHPMailerAutoload.php';
require 'class.ClientList.php';
$mail = new PHPMailer;
$clientlist = new ClientList;
require 'mail_config.php';

//Contenido del correo
	$body = file_get_contents('content/newsletter.html');			//Fichero html a importar

	$mail->Subject = $REQUEST_['subjet'];
	$mail->Body    = $body;
	$mail->AltBody = $REQUEST_['altbody'];;
	$mail->setFrom($REQUEST_['from'];, $REQUEST_['fromname'];);			// Add a sender

	$clientes=$clientlist->listarClientes();
	
	foreach ($clientes as $id => $row) {
		$mail->addAddress($row['email']);     			// Add a recipient

		try{
			//Comprobar envio satisfactorio
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} 
			else {
			    echo 'Message has been sent';
			}
		}
		catch (Exception $e){
		    echo 'No se puede continuar: ',  $e->getMessage(), "\n";
		}
	}