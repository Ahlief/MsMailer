<?php
	//Configuración del servidor
	$mail->Host 		= 'send.one.com';  								// Specify main and backup SMTP servers
	$mail->SMTPAuth 	= true;                              			// Enable SMTP authentication
	$mail->Port 		= 25;                                    			// TCP port to connect to
//	$mail->Username = '';                 							// SMTP username
//	$mail->Password = '';                           				// SMTP password
//	$mail->SMTPSecure = 'tls';                            		// Enable TLS encryption, `ssl` also accepted

	//Opciones de envio
	$mail->isSMTP();                                     			// Set mailer to use SMTP
	$mail->isHTML(true);                                  			// Set email format to HTML

	//Opciones del correo
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->setFrom('oscar@mibuenordenador.com', 'Oscar.G');		// Add a sender
	//$mail->addAddress('example@mail.com', 'example');     		// Add a recipient out the list
	//$mail->addAddress('ellen@example.com');              			// Name is optional
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//Opciones de Adjuntos
	//$mail->addAttachment('/var/tmp/file.tar.gz');        			// Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    		// Optional name

	