<?php

/* Formulario de contacto HTML5, PHP Y Bootstraps
  Creado por: www.render2web.com
  Version: 1.1 */

//Comprobamos que se haya presionado el boton enviar
//Guardamos en variables los datos enviados
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$mensaje = $_POST['mensaje'];

if (isset($_POST['checkboxTienda'])) {
    $checkboxTienda = $_POST['checkboxTienda'];
} else {
    $checkboxTienda = 0;
}
if (isset($_POST['checkboxDelivery'])) {
    $checkboxDelivery = $_POST['checkboxDelivery'];
} else {
    $checkboxDelivery = 0;
}
if (isset($_POST['checkboxDistribuidor'])) {
    $checkboxDistribuidor = $_POST['checkboxDistribuidor'];
} else {
    $checkboxDistribuidor = 0;
}


///Validamos del lado del servidor que el nombre y el email no estén vacios
if ($nombre == '') {
    echo "Debe ingresar su nombre";
} else if ($email == '') {
    echo "Debe ingresar su email";
} else {
    echo 4;
    $para = "cesarestrada090@gmail.com"; //Email al que se enviará
    $asunto = "Nuevo Cliente 4LIFE"; //Puedes cambiar el asunto del mensaje desde aqui
    //Este sería el cuerpo del mensaje
    $msj = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		   <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
			<td width='70%' align='left'>$telefono</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Ciudad:</strong></td>
			<td width='70%' align='left'>$ciudad</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Dirección:</strong></td>
			<td width='70%' align='left'>$direccion</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Comentario:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
                  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Cliente:</strong></td>
			<td align='left'>$checkboxTienda</td>
		  </tr>
                  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Delivery:</strong></td>
			<td align='left'>$checkboxDelivery</td>
		  </tr>
                  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Distribuidor:</strong></td>
			<td align='left'>$checkboxDistribuidor</td>
		  </tr>
	</table>	
";

//Cabeceras del correo
    $headers = "From: $nombre <$email>\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
    if (mail($para, $asunto, $msj, $headers)) {
        echo "Su mensaje se ha enviado correctamente";
        echo "<br />";
        echo '<a href="../formulario_contacto.html">Volver</a>';
    } else {
        echo "success";
    }
}
?>