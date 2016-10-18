<html>
	<head>
		<title>MsMailer Testeos</title>
	</head>
	<body>
		<form action="smtp.php" method="post">
			<fieldset>
				<legend>Formulario de Ejemplo</legend>
				<table>
					<tr>
						<td>Usuario</td>
						<td><input  name="fromname" type="text" required="" size="40" value="prueba"/></td>
					</tr>
					<tr>
						<td>Asunto</td>
						<td><input  name="subjet" type="text" required size="40" value="prueba" /></td>
					</tr>
					<tr>
						<td>Correo de origen</td>
						<td><input name="from" type="email" required size="40" value="oscar@mibuenordenador.com"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input name="pass" type="password" required /></td>
					</tr>
					<tr>
						<td colspan="2"><textarea name="altbody" placeholder="Contenido del mensaje"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input name="enviar" type="submit" value="Enviar" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>