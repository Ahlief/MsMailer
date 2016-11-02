<?php
    if (isset($_REQUEST['from']) && !empty($_REQUEST['from']) 
            && isset($_REQUEST['pass']) && !empty($_REQUEST['pass']) 
            && isset($_REQUEST['subjet']) && !empty($_REQUEST['subjet'])
            && isset($_REQUEST['fromname']) && !empty($_REQUEST['fromname']) ) {
        
    }
	require "phpmailer/PHPMailerAutoload.php";
	$mail = new PHPMailer;
	
	require "class.ClientList.php";
	$clientlist = new ClientList;
	
	require "mail_config.php";

	$body = file_get_contents("html/newsletter.html");			// Fichero html a importar

	$mail->Username = $_REQUEST['from'];                 		// SMTP username
	$mail->Password = $_REQUEST['pass'];						// Pass SMTP username
	$mail->Subject = $_REQUEST['subjet'];						// Asunto
	$mail->AltBody = $_REQUEST['altbody'];						// Texto alternativo (si HTML no está habilitado)
	$mail->setFrom($_REQUEST["from"], $_REQUEST['fromname']);	// Add a sender
	
	// Recogida de clientes y envio masivo
	$clientes=$clientlist->getClientesSubscritos();
	while($row=mysqli_fetch_array($clientes))
	{	
		$link=$clientlist->linkmaker($row['id']);		
		$mail->Body = str_replace("%unsubscribe%", $link, $body);
		$mail->addBCC($row['email']);							
		
		try{
                    if(!$mail->send()) {								// Comprobar envio satisfactorio
                        $clientlist->addError($row['id']);
                    } 
                    else {
                       $clientlist->addEnviado($row['id']);
                    }
		}
		catch (Exception $e) {
			echo "No se puede continuar: ", $e->getMessage(), "\n";	// Registro de Excepción al enviar
		}

	$mail->clearBCCs(); 										// Eliminar lista de envios para evitar duplicados
	}