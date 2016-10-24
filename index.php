<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>MsMailer Testeos</title>
	</head>
	<body>
		<form action="smtp.php" method="post">
			<fieldset>
				<legend>Formulario de Ejemplo</legend>
				<table>
					<tr>
						<th>Usuario</th>
						<td><input  name="fromname" type="text" required="" size="40" value="prueba"/></td>
					</tr>
					<tr>
						<th>Asunto</th>
						<td><input  name="subjet" type="text" required size="40" value="prueba" /></td>
					</tr>
					<tr>
						<th>Correo de origen</th>
						<td><input name="from" type="email" required size="40" value="oscar@mibuenordenador.com"/></td>
					</tr>
					<tr>
						<th>Password</th>
						<td><input name="pass" type="password" required /></td>
					</tr>
					<tr>
						<th>Texto sin HTML</th>
						<th colspan="2"><textarea name="altbody" cols="50" rows="6" placeholder="Contenido del mensaje"></textarea></th>
					</tr>
					<tr>
						<td colspan="2">(Deshabilitado) <input name="newsletter" type="file" disabled="disabled" /></td>
					</tr>
					<tr>
						<td colspan="2"><input name="enviar" type="submit" value="Enviar" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>