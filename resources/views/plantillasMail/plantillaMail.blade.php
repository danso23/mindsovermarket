
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
</head>
<body style="margin:0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
		<tr>
			<td>
				<!--Tabla general o cuerpo del correo-->
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
					<!--Titulo o imgen, encabezado-->
					<tr>
						<td align="center" bgcolor="#48448f" style="padding: 40px 0 30px 0">
							<img src="{{asset('images/logo.png')}}" alt="Logo" style="display: block;" />
						</td>
					</tr>
					<!--cuerpo del correo-->
					<tr>
						<td bgcolor="##70b62c" style="padding: 40px 30px 40px 30px;">
							<table border="0" cellspacing="0" cellpadding="0" width="100%">
								<tr>
									<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
										<b>¡Hola, bienvenido a MOM!</b>
									</td>
								</tr>
								<tr>
									<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px">
										Nombre: {{$datos['name_contacto']}}			
										<br />
										Asunto: {{$datos['asunto_contacto']}}
										<br />
										Mensaje: {{$datos['mensaje_contacto']}}
										<br />
										Correo: {{$datos['email_contacto']}}
										<br />
										
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<!--fin cuerpo de correo-->

					<!--inicio footer de encabezado-->
					<tr>
						<td bgcolor="#48448f" style="padding: 30px 30px 30px 30px">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td width="75%" style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">&reg; Derechos reservados {{date("Y")}}
										<!--<br /> 
										<a href="" style="color: #ffffff;"><font color="#ffffff">unsicubrasfasdfasdfas </font></a>-->
									</td>
									<td align="right">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td>
													<a href="">
														<img src="" alt="" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">
													&nbsp;
												</td>
												<td>
													<a href="">
														<img src="" alt="" width="38" height="38"  style="display: block;" border="0" />
													</a>
												</td>
											</tr>
										</table>
									</td>
								</tr>								
							</table>	
						</td>
					</tr>					
				</table><!--fin tabla general de la plantilla del correo-->
			</td>
		</tr>
	</table>	
</body>
</html>