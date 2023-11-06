<?php //include("bloque.php"); ?> 
<?php
	// $connect = mysqli_connect("localhost", "root", "Pass8520456+", "limac_portal"); mysqli_set_charset($connect,"utf8");
	// include("../../../limac_conexion/conexion.php");
	// date_default_timezone_set('America/Lima');
	// setlocale(LC_ALL, 'es_PE');
	//$user_login=$_SESSION["admin"];	
	include ('variables.php');		
?>

<?php
		$idtradd = '1005231102023';
		$tipocot = 'RYE';
		$atencion = '';
		$symbol = '$';
		$est = 'Estimado(a) ';
		$nombre_cliente = 'Empresa cliente';
		$discount ='';
		$urgencia = '';
		$valores = 'Valores expresados en dólares americanos ($).';
		$detalle_entrega = 'Entrega inmediata.';
		$fecha_entrega = '31/10';
		$hora1 = '10:00 AM';
		$fecha_entrega2 = '30/10';
		$hora2 = '12:00PM';
		$metodo_pago = '100% contraentrega';
		$formato_entrega = '100% digital';
		$validez_oferta = '3 días';
		$tipo_entrega = 'Recojo en oficina';





		$asunto ="【COTIZACIÓN N° ".$idtradd."】";

		$mensaje = "<html><head><style type='text/css'>
        body {font-family: maven_pro !important;}
        </style></head><body>";
		$mensaje .= "<div class='container' style='width:900px;'>";
		$mensaje .= "<div style='width:50px; text-align:center; display: inline-block; margin: 0;'></div>";
		$mensaje .= "<div style='width:800px;display:inline-block;margin-top:35px;margin-bottom:35px;font-size:14px;font-family:Maven Pro,sans-serif;border:1px solid #ccc;background:#FFF;padding-left: 40px;
		padding-right: 40px;padding-top: 30px;'>";

		$mensaje .= "<div style='width:140px;display:inline-block;'><img src='https://www.limac.com.pe/assets/images/limac_gradient.jpg' width='120'></div>";

		$mensaje .= "<div style='width:250px;display:inline-block;text-align:center;float:right;'>";

		if($tipocot=='RYE'){
			$mensaje .= "R&E TRADUCCIONES S. A. C.<br>R. U. C. 20551971300<br>";
		} else {
			$mensaje .= "LIMAC DEL PERÚ E.I.R.L.<br>R. U. C. 20603296410<br>";
		}

		$mensaje .="COTIZACIÓN N° ".$idtradd."</div><br>";
		$mensaje .= "<div style='width:800px; text-align:right; margin-top:40px;'>Lima, 05 de Noviembre de 2023</div><br>";
		$mensaje .= "<div style='width:800px; text-align:left;font-weight: 600;font-size: 16px;'>".$est.$nombre_cliente.":</div>";

		if($atencion=='Si'){
			$mensaje.="<div style='width:800px; text-align:left;font-size: 16px;'>Atención: ".$at."</div>";
		}

		$mensaje .= "<br><div style='width:800px; text-align:justify;'>Gracias por comunicarse con nosotros para la cotización de su traducción, 
        a continuación le presentamos los detalles de la cotización y le indicaremos qué incluye el precio de su proyecto.</div><br><br>";

		$mensaje .= "<div style='width:800px;'>".
		"<table style='width:100%; border-collapse:collapse;'>".
		"<tr style='border-bottom: 3px solid #047ab7;color: #000;'>
		<th><b>Cantidad</b></th>
		<th align='center' style='width:80px;'><b>Unidad</b></th>
		<th style='text-align:center;width:430px;'><b>Descripción</b></th> 
		<th><b>V. Unitario (".$symbol.")</b></th>
		<th><b>Importe (".$symbol.")</b></th>
		</tr>";

		$cc = 0;
		$desc = [];
		foreach( $desc as $keyy => $ub ) {

			if($desc_mv[$keyy]=='' || $desc_mv[$keyy]<1){
				$mensaje.="<tr style='color:#868686 !important;";

				if($cc++%2==1){$mensaje.="height:20px;background:#EDEDED;'"; }else{$mensaje.="height:20px;'";}

				$mensaje.=">
				<td style='text-align:center;background:#FFF;font-size:12px;'>".$cantidad[$keyy]."</td>
				<td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'>".$tipo_unidad[$keyy]."</td>
				<td style='font-size:12px;'>".$detalles[$keyy]." ".$ub." ".$idiomas[$keyy]." ".$dest[$keyy]." Cantidad de paginas: ".$paginas."</td> 
				<td style='text-align:center;font-size:12px;'>".$precio_unitario[$keyy]."</td>
				<td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>".$importe[$keyy]."</td>
				</tr>";

			} else {

	  			$imp[$keyy] = $cantidad[$keyy] * $precio_unitario[$keyy]; //1*118
	  			$pr_unitd[$keyy] = $precio_unitario[$keyy] * ($desc_mv[$keyy]/100);//118 * 0.05 = 5.9
	  			$impd[$keyy] = $cantidad[$keyy] * $pr_unitd[$keyy]; //1*5.9

				$mensaje.="<tr style='color:#868686 !important;";

				if($cc++%2==1){$mensaje.="height:20px;background:#EDEDED;'"; }else{$mensaje.="height:20px;'";}

				$mensaje.=">
				<td style='text-align:center;background:#FFF;font-size:12px;'>".$cantidad[$keyy]."</td>
				<td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'>".$tipo_unidad[$keyy]."</td>
				<td style='font-size:12px;'>".$detalles[$keyy]." ".$ub." ".$idiomas[$keyy]." ".$dest[$keyy]." Cantidad de paginas: ".$paginas."</td> 
				<td style='text-align:center;font-size:12px;'>".$precio_unitario[$keyy]."</td>
				<td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>".number_format($imp[$keyy],2,'.',',')."</td>
				</tr>";

				$mensaje.="<tr style='color:#868686 !important;";

				if($cc++%2==1){
					$mensaje.="height:20px;background:#EDEDED;'"; 
				}else{
					$mensaje.="height:20px;'";
				}

				$mensaje.=">
				<td style='text-align:center;background:#FFF;font-size:12px;'>".$cantidad[$keyy]."</td>
				<td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'>".$tipo_unidad[$keyy]."</td>
				<td style='font-size:12px;'>Descuento ".$desc_mv[$keyy]."%</td> 
				<td style='text-align:center;font-size:12px;'>-".number_format($pr_unitd[$keyy],2,'.',',')."</td>
				<td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>-".number_format($impd[$keyy],2,'.',',')."</td>
				</tr>";

			}
		}	  	
		
		if($discount=='Si'){
            $mensaje.="<tr style='color:#868686 !important;'>
            <td style='text-align:center;font-size:12px;'></td>
            <td style='text-align:center;background:#EDEDED;border-left: 3px solid #047ab7;font-size:12px;'></td>
            <td style='font-size:12px;background:#EDEDED;'>Descuento por promoción ";

            if($codigo=='TRUSTPILOT'){
                $mensaje.="- Código ".$codigo_trust;
            }

            if($codigo=='GOOGLE'){
                $mensaje.="- Código ".$codigo_google;
            }

            $mensaje.="</td> 
            <td style='text-align:center;font-size:12px;background:#EDEDED;'>-".$dmonto."</td>
            <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;background:#EDEDED;'>-".$dmonto."</td>
            </tr>";
        }

        if($urgencia=='Si'){
            $mensaje.="<tr style='color:#868686 !important;'>
            <td style='text-align:center;font-size:12px;'></td>
            <td style='text-align:center;background:#EDEDED;border-left: 3px solid #047ab7;font-size:12px;'></td>
            <td style='font-size:12px;background:#EDEDED;'>Monto por urgencia</td> 
            <td style='text-align:center;font-size:12px;background:#EDEDED;'>".$montourg."</td>
            <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;background:#EDEDED;'>".$montourg."</td>
            </tr>";
        }

        $mensaje.="<tr style='height:20px;background:#EDEDED;'>
                <td style='text-align:center;background:#FFF;font-size:12px;'></td>
                <td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'></td>
                <td style='height:20px;font-size:12px;'></td> 
                <td style='text-align:center;font-size:12px;'></td>
                <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'></td>
                </tr>
                <tr style='height:20px;background:#FFF;'>
                <td style='text-align:center;background:#FFF;font-size:12px;'></td>
                <td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'></td>
                <td style='height:20px;font-size:12px;'></td> 
                <td style='text-align:center;font-size:12px;'></td>
                <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'></td>
                </tr>
                <tr style='height:20px;background:#EDEDED;'>
                <td style='text-align:center;background:#FFF;font-size:12px;'></td>
                <td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'></td>
                <td style='height:20px;font-size:12px;'></td> 
                <td style='text-align:center;font-size:12px;'></td>
                <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'></td>
                </tr>";


		$mensaje.="<tr>
		<td style='background:#FFF;'></td>
		<td rowspan='3' colspan='2' style='border-left: 3px solid #047ab7;border-bottom:3px solid #047ab7;vertical-align:top;'>
		<b>Notas: </b>".$valores."<br>".$detalle_entrega."
		</td>
		<td style='text-align:right;'><b>Subtotal:</b></td>
		<td style='text-align:right;border-right: 3px solid #047ab7;'>".$symbol." 0.70</td>
		</tr>".
		"<tr>
		<td style='background:#FFF;'></td>
		<td style='text-align:right;'><b>IGV 18%:</b></td>
		<td style='text-align:right;border-right: 3px solid #047ab7;'>".$symbol." 0.13</td>
		</tr>".
		"<tr style='background: #047ab7;color: #FFF;'>
		<td style='background:#FFF;'></td>
		<td style='text-align:right;border-bottom:3px solid #047ab7;'><b>Total:</b></td>
		<td style='text-align:right;border-right: 3px solid #047ab7;border-bottom:3px solid #047ab7;'>".$symbol." 0.83</td>
		</tr>".

		"</table></div>";

		$mensaje .= "<br><br><div style='width:800px;'><b>Detalles Adicionales: </b></div>";
		$mensaje .= "<table style='width:100%; border-collapse:collapse;'>
		

		<tr>
		<td style='text-align:right; font-weight:500; width:45%;border-top:3px solid #72c3a9;'>Tiempo de Entrega</td>
		<td style='text-align:center; background:#72c3a9;border-top:3px solid #72c3a9;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;'>".$fecha_entrega." a las ".$hora1." con aprobación el<br>".$fecha_entrega2." antes de las ".$hora2."</td>
		</tr>

		<tr>
		<td style='text-align:right; font-weight:500;'>Método de pago</td>
		<td style='text-align:center;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;'>".$metodo_pago."</td>
		</tr>

		<tr>
		<td style='text-align:right; font-weight:500;'>Formato de Entrega</td>
		<td style='text-align:center;background:#72c3a9;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;'>".$formato_entrega."</td>
		</tr>

		<tr>
		<td style='text-align:right; font-weight:500;'>Validez de oferta</td>
		<td style='text-align:center;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;'>".$validez_oferta."</td>
		</tr>

		<tr>
		<td style='text-align:right; font-weight:500;'>Tipo de Entrega</td>
		<td style='text-align:center;background:#72c3a9;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;border-bottom:3px solid #72c3a9;'>".$tipo_entrega."</td>
		</tr>


		</table>";
		$url_pay = '#';
		$mensaje .="<h4 style='font-size:12px;'>Pague con su tarjeta crédito o débito ingresando a <a style='text-decoration:none; color:#0093df;' href='".$url_pay."' target='_blank'>".$url_pay."</a></h4>";
        $mensaje .="<table style='width:100%;border-collapse:collapse;'>
                <tr style='text-align:center;'>
                <td style='text-align:center;'><a href='".$url_pay."' target='_blank'><img src='https://www.limac.com.pe/library/images/logos.jpg'></a></td></tr></table>";

        if($tipocot=='RYE'){

			/*$mensaje .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df;' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
				<table style='width:100%;border-collapse:collapse;'>
					<tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
					</tr>

					<tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
						<td><img src='http://www.limac.com.pe/assets/images/bcp-logo-gray.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>192-2172045-0-47</td>
						<td style='font-size: 11px;text-align: center;'>002-192-002172045047-33</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>

					<tr style='font-size: 11px;text-align: center;'>
						<td><img src='http://www.limac.com.pe/assets/images/bcp-logo-gray.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Dólar Estadounidense (USD)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>192-2145311-1-17</td>
						<td style='font-size: 11px;text-align: center;'>002-192-002145311117-37</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>

				</table>";*/
			$mensaje4 ='';
			$mensaje4 .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df;' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
				<table style='width:100%;border-collapse:collapse;'>
					<tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
					</tr>

					<tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
						<td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>0913001566459</td>
						<td style='font-size: 11px;text-align: center;'>003-091-003001566459-69</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>

					<tr style='font-size: 11px;text-align: center;'>
						<td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Dólar Estadounidense (USD)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>0913001566466</td>
						<td style='font-size: 11px;text-align: center;'>003-091-003001566466-64</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>

				</table>";

        } else {

		/*$mensaje .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df;' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
            <table style='width:100%;border-collapse:collapse;'>
				<tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
				</tr>
				<tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
					<td><img src='https://www.limac.com.pe/assets/images/bbva-continental.png' width='65'></td>
					<td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
					<td style='font-size: 11px;text-align: center;'>Corriente</td>
					<td style='font-size: 11px;text-align: center;'>0011-0467-0100004771</td>
					<td style='font-size: 11px;text-align: center;width:180px;'>011-467-000100004771-80</td>
					<td style='font-size: 11px;text-align: center;width:150px;'>LIMAC DEL PERÚ E.I.R.L.</td>
				</tr>
            </table>";*/

            $mensaje4 .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df;' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
            <table style='width:100%;border-collapse:collapse;'>
            <tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
            </tr>
            <tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
                <td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
                <td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
                <td style='font-size: 11px;text-align: center;'>Corriente</td>
                <td style='font-size: 11px;text-align: center;'>200-3001567347</td>
                <td style='font-size: 11px;text-align: center;width:180px;'>003-200-003001567347-35</td>
                <td style='font-size: 11px;text-align: center;width:150px;'>LIMAC DEL PERÚ E.I.R.L.</td>
            </tr>

            <tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
                <td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
                <td style='font-size: 11px;text-align: center;'>Dólar Estadounidense (USD)</td>
                <td style='font-size: 11px;text-align: center;'>Corriente</td>
                <td style='font-size: 11px;text-align: center;'>200-3001567362</td>
                <td style='font-size: 11px;text-align: center;width:180px;'>003-200-003001567362-34</td>
                <td style='font-size: 11px;text-align: center;width:150px;'>LIMAC DEL PERÚ E.I.R.L.</td>
            </tr>
            </table>";

        }

		
		$mensaje .= "<br><div style='width:800px;'>".
		"<p>Cordialmente,</p>
		<p>Departamento de Ventas.</p>";

		$mensaje .= "<img src='https://www.limac.com.pe/assets/images/limac_gradient.jpg' width='120'><br>";

		$mensaje.="</div>";		

		$mensaje .= "<div style='width:800px; font-size:10px; color:#aaa;'>".
		"IMPORTANTE/CONFIDENCIAL<br>
		Este documento contiene información personal, confidencial que van dirigidos única y exclusivamente a su destinatario y, de acuerdo a ley, no puede ser difundido. 
		Está completamente prohibido realizar copias, parciales o totales, así como propagar su contenido a otras personas que no sean el destinatario. 
		Si usted recibió este documento por error, sírvase informarlo al remitente y deshacerse del documento inmediatamente.</div><br>";

		$mensaje .= "<div style='width:800px; text-align:center;'>";

		if($tipocot=='RYE'){
			$mensaje.="R&E TRADUCCIONES S.A.C.<br>";
		} else {
			$mensaje.="LIMAC DEL PERÚ E.I.R.L.<br>";
		}

		$mensaje.= $direccion;

		// if($tipocot=='RYE'){
		// 	$mensaje.="Schreiber 210";
		// } else {
		// 	$mensaje.="Schreiber 210";
		// }

		$mensaje.=", Lima.<br>
		Teléfono: ";
		// $xcv = "SELECT * FROM telephone where estado='MOSTRAR'";
		// $rxcv = mysqli_query($connect,$xcv);
		// $gxcv = mysqli_fetch_array($rxcv,MYSQLI_ASSOC);
		$mensaje .= '999-999-999';
		$eemail = 'limac@limac';

		$mensaje.=" * Correo Electrónico: ".$eemail."<br>".
		"</div><br><br>";
		$mensaje .= "<div style='width:50px; text-align:center; display: inline-block; margin: 0;'></div>";
		$mensaje .="</body></html>";



		///////////////////

		$html = "<html><head><style type='text/css'>
        body {font-family: maven_pro !important;}
        </style></head><body><div class='container' style='width:900px;'>";
        //$html .= "<div style='width:50px; text-align:center; display: inline-block; margin: 0;'></div>";
        $html .= "<div style='width:900px;display:inline-block;margin-top:0px;margin-bottom:35px;font-family:Maven Pro;font-size:14px;background:#FFF;padding-left: 0px;
        padding-right: 0px;padding-top: 0px;'>";

		$html .= "<div style='width:260px;display:inline-block;'><img src='https://www.limac.com.pe/assets/images/limac_gradient.jpg' width='120'></div>";

        $html .= "<div style='width:218px;display:inline-block;text-align:center;float:right;'>";

        if($tipocot=='RYE'){
			$html .= "R&E TRADUCCIONES S. A. C.<br>R. U. C. 20551971300<br>";
		} else {
			$html .= "LIMAC DEL PERÚ E.I.R.L.<br>R. U. C. 20603296410<br>";
		}



		$dia2 = '05'; 
		$mes = 'Noviembre';
		$ano = '2020';

        $html.="COTIZACIÓN N° ".$idtradd."</div><br>";
        $html .= "<div style='width:800px; text-align:right; margin-top:30px;'>Lima, ".$dia2." de ".$mes." del ".$ano."</div><br>";
        $html .= "<div style='width:800px; text-align:left;font-weight: 600;font-size: 16px;'><b>".$est.$nombre_cliente.":</b></div>";
        if($atencion=='Si'){
			$html.="<div style='width:800px; text-align:left;font-size: 14px;'>Atención: ".$at."</div>";
		}
        $html .= "<br><div style='width:800px; text-align:justify;font-size:13px;'>Gracias por comunicarse con nosotros para la cotización de su traducción, 
        a continuación le presentamos los detalles de la cotización y le indicaremos qué incluye el precio de su proyecto.</div><br>";
        $html .= "<div style='width:800px;'>".
        "<table style='width:100%; border-collapse:collapse;'>".
        "<tr style='color: #000 !important;border-bottom: 3px solid #047ab7;'>
        <th style='width:50px;font-size:12px;border-bottom: 3px solid #047ab7;'><b>Cantidad</b></th>
        <th style='font-size:12px;text-align:center;width:60px;border-bottom: 3px solid #047ab7;'><b>Unidad</b></th>
        <th style='text-align:center;width:390px;font-size:12px;border-bottom: 3px solid #047ab7;'><b>Descripción</b></th> 
        <th style='font-size:12px;border-bottom: 3px solid #047ab7;'><b>V. Unitario (".$symbol.")</b></th>
        <th style='font-size:12px;border-bottom: 3px solid #047ab7;'><b>Importe (".$symbol.")</b></th>
        </tr>";


        $c = 0;

		foreach( $desc as $key => $u ) {

			if($desc_mv[$key]=='' || $desc_mv[$key]<1){
				$html.="<tr style='color:#868686;";

				if($c++%2==1){$html.="!important;height:20px;background:#EDEDED;'"; }else{$html.="!important;height:20px;'";}

				$html.=">
				<td style='text-align:center;background:#FFF;font-size:12px;'>".$cantidad[$key]."</td>
				<td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'>".$tipo_unidad[$key]."</td>
				<td style='font-size:12px;'>".$detalles[$key]." ".$u." ".$idiomas[$key]." ".$dest[$key]."Cantidad de paginas: ".$paginas."</td> 
				<td style='text-align:center;font-size:12px;'>".$precio_unitario[$key]."</td>
				<td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>".$importe[$key]."</td>
				</tr>";

			} else {

	  			$imp[$key] = $cantidad[$key] * $precio_unitario[$key]; //1*118
	  			$pr_unitd[$key] = $precio_unitario[$key] * ($desc_mv[$key]/100);//118 * 0.05 = 5.9
	  			$impd[$key] = $cantidad[$key] * $pr_unitd[$key]; //1*5.9

				$html.="<tr style='color:#868686;";

				if($c++%2==1){$html.="!important;height:20px;background:#EDEDED;'"; }else{$html.="!important;height:20px;'";}

				$html.=">
				<td style='text-align:center;background:#FFF;font-size:12px;'>".$cantidad[$key]."</td>
				<td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'>".$tipo_unidad[$key]."</td>
				<td style='font-size:12px;'>".$detalles[$key]." ".$u." ".$idiomas[$key]." ".$dest[$key]."Cantidad de paginas: ".$paginas."</td> 
				<td style='text-align:center;font-size:12px;'>".$precio_unitario[$key]."</td>
				<td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>".number_format($imp[$key],2,'.',',')."</td>
				</tr>";

				$html.="<tr style='color:#868686;";

				if($c++%2==1){$html.="!important;height:20px;background:#EDEDED;'"; }else{$html.="!important;height:20px;'";}

				$html.=">
				<td style='text-align:center;background:#FFF;font-size:12px;'>".$cantidad[$key]."</td>
				<td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'>".$tipo_unidad[$key]."</td>
				<td style='font-size:12px;'>Descuento ".$desc_mv[$key]."%</td> 
				<td style='text-align:center;font-size:12px;'>-".number_format($pr_unitd[$key],2,'.',',')."</td>
				<td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>-".number_format($pr_unitd[$key],2,'.',',')."</td>
				</tr>";
			}
		}

		if($discount=='Si'){
            $html.="<tr style='color:#868686 !important;'>
            <td style='text-align:center;font-size:12px;'></td>
            <td style='text-align:center;background:#EDEDED;border-left: 3px solid #047ab7;font-size:12px;'></td>
            <td style='font-size:12px;background:#EDEDED;'>Descuento por promoción ";

            if($codigo=='TRUSTPILOT'){
                $mensaje.="- Código ".$codigo_trust;
            }

            if($codigo=='GOOGLE'){
                $mensaje.="- Código ".$codigo_google;
            }

            $html.="</td> 
            <td style='text-align:center;font-size:12px;background:#EDEDED;'>-".$dmonto."</td>
            <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;background:#EDEDED;'>-".$dmonto."</td>
            </tr>";
        }

        if($urgencia=='Si'){
            $html.="<tr style='color:#868686 !important;'>
            <td style='text-align:center;font-size:14px;'></td>
            <td style='text-align:center;background:#EDEDED;border-left: 3px solid #047ab7;font-size:12px;'></td>
            <td style='font-size:12px;background:#EDEDED;'>Monto por urgencia</td> 
            <td style='text-align:center;font-size:12px;background:#EDEDED;'>".$montourg."</td>
            <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;background:#EDEDED;'>".$montourg."</td>
            </tr>";
        }


        $html.="<tr style='height:20px;background:#EDEDED;'>
                <td style='text-align:center;background:#FFF;font-size:12px;'></td>
                <td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'></td>
                <td style='height:20px;font-size:12px;'></td> 
                <td style='text-align:center;font-size:12px;'></td>
                <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'></td>
                </tr>
                <tr style='height:20px;background:#FFF;'>
                <td style='text-align:center;background:#FFF;font-size:12px;'></td>
                <td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'></td>
                <td style='height:20px;font-size:12px;'></td> 
                <td style='text-align:center;font-size:12px;'></td>
                <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'></td>
                </tr>
                <tr style='height:20px;background:#EDEDED;'>
                <td style='text-align:center;background:#FFF;font-size:12px;'></td>
                <td style='text-align:center;border-left: 3px solid #047ab7;font-size:12px;'></td>
                <td style='height:20px;font-size:12px;'></td> 
                <td style='text-align:center;font-size:12px;'></td>
                <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'></td>
                </tr>";
        
        $html.="<tr>
        <td style='background:#FFF;'></td>
        <td rowspan='3' colspan='2' style='border-left: 3px solid #047ab7;border-bottom:3px solid #047ab7;vertical-align:top;font-size:12px;'>
        <b>Notas: </b>".$valores."<br>".$detalle_entrega."
        </td>
        <td style='text-align:right;font-size:12px;'><b>Subtotal:</b></td>
        <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>".$symbol." 0.70</td>
        </tr>".
        "<tr>
        <td style='background:#FFF;'></td>
        <td style='text-align:right;font-size:12px;'><b>IGV 18%:</b></td>
        <td style='text-align:right;border-right: 3px solid #047ab7;font-size:12px;'>".$symbol." 0.13</td>
        </tr>".
        "<tr style='background: #047ab7;color: #FFF;'>
        <td style='background:#FFF;'></td>
        <td style='text-align:right;color:#FFF;border-bottom:3px solid #047ab7;'><b>Total:</b></td>
        <td style='text-align:right;color:#FFF;border-right: 3px solid #047ab7;border-bottom:3px solid #047ab7;'>".$symbol." 0.83</td>
        </tr>".

        "</table></div>";

        $html .= "<br><div style='width:800px;'><b>Detalles Adicionales: </b></div>";
        $html .= "<table style='width:100%; border-collapse:collapse;'>
        

        <tr>
        <td style='text-align:right; font-weight:500; width:45%;border-top:3px solid #72c3a9;font-size:13px;'>Plazo de Entrega</td>
        <td style='text-align:center; background:#72c3a9;border-top:3px solid #72c3a9;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;font-size:13px;'>".$fecha_entrega." a las ".$hora1." con aprobación el<br>".$fecha_entrega2." antes de las ".$hora2."</td>
        </tr>

        <tr>
        <td style='text-align:right; font-weight:500;font-size:13px;'>Método de pago</td>
        <td style='text-align:center;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;font-size:13px;'>".$metodo_pago."</td>
        </tr>

        <tr>
        <td style='text-align:right; font-weight:500;font-size:13px;'>Formato de Entrega</td>
        <td style='text-align:center;background:#72c3a9;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;font-size:13px;'>".$formato_entrega."</td>
        </tr>

        <tr>
        <td style='text-align:right; font-weight:500;font-size:13px;'>Validez de oferta</td>
        <td style='text-align:center;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;font-size:13px;'>".$validez_oferta."</td>
        </tr>

        <tr>
        <td style='text-align:right; font-weight:500;font-size:13px;'>Tipo de Entrega</td>
        <td style='text-align:center;background:#72c3a9;border-left:3px solid #72c3a9;border-right:3px solid #72c3a9;font-size:13px;'>".$tipo_entrega."</td>
        </tr>

        </table>";

        $html .="<h4 style='font-size:12px;'>Pague con su tarjeta crédito o débito ingresando a <a style='text-decoration:none; color:#047AB7' href='".$url_pay."' target='_blank'>".$url_pay."</a></h4>";
        $html .="<table style='width:100%;border-collapse:collapse;'>
                <tr style='text-align:center;'>
                <td style='text-align:center;'><a href='".$url_pay."' target='_blank'><img src='https://www.limac.com.pe/library/images/logos.jpg'></a></td></tr></table>";

        if($tipocot=='RYE'){

			/*$html .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
				<table style='width:100%;border-collapse:collapse;'>
					<tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
					</tr>

					<tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
						<td><img src='http://www.limac.com.pe/assets/images/bcp-logo-gray.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>192-2172045-0-47</td>
						<td style='font-size: 11px;text-align: center;'>002-192-002172045047-33</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>

					<tr style='font-size: 11px;text-align: center;'>
						<td><img src='http://www.limac.com.pe/assets/images/bcp-logo-gray.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Dólar Estadounidense (USD)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>192-2145311-1-17</td>
						<td style='font-size: 11px;text-align: center;'>002-192-002145311117-37</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>
				</table>";*/
			
			$html4 = '';

			$html4 .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df;' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
				<table style='width:100%;border-collapse:collapse;'>
					<tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
						<td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
					</tr>

					<tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
						<td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>0913001566459</td>
						<td style='font-size: 11px;text-align: center;'>003-091-003001566459-69</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>

					<tr style='font-size: 11px;text-align: center;'>
						<td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
						<td style='font-size: 11px;text-align: center;'>Dólar Estadounidense (USD)</td>
						<td style='font-size: 11px;text-align: center;'>Corriente</td>
						<td style='font-size: 11px;text-align: center;'>0913001566466</td>
						<td style='font-size: 11px;text-align: center;'>003-091-003001566466-64</td>
						<td style='font-size: 11px;text-align: center;'>R&E Traducciones S.A.C.</td>
					</tr>
				</table>";

        } else {

			/*$html .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
            <table style='width:100%;border-collapse:collapse;'>
				<tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
					<td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
				</tr>
				<tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
					<td><img src='https://www.limac.com.pe/assets/images/bbva-continental.png' width='65'></td>
					<td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
					<td style='font-size: 11px;text-align: center;'>Corriente</td>
					<td style='font-size: 11px;text-align: center;'>0011-0467-0100004771</td>
					<td style='font-size: 11px;text-align: center;width:180px;'>011-467-000100004771-80</td>
					<td style='font-size: 11px;text-align: center;width:150px;'>LIMAC DEL PERÚ E.I.R.L.</td>
				</tr>
            </table>";*/

            $html4 .="<h4 style='font-size:11.5px;'>También puede pagar mediante depósito o transferencia bancaria y enviar el comprobante de pago a <a style='text-decoration:none; color:#0093df;' href='mailto:ventas@limac.com.pe'>ventas@limac.com.pe</a></h4>
            <table style='width:100%;border-collapse:collapse;'>
            <tr style='background:#88847E;color:#FFF;text-align:center;font-size:11px;'>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Banco</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Moneda</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Tipo de Cuenta</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Número de cuenta</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Código Interbancario(CCI)</td>
                <td style='color:#FFF;text-align:center;font-size:11px;'>Titular</td>
            </tr>
            <tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
                <td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
                <td style='font-size: 11px;text-align: center;'>Soles (PEN)</td>
                <td style='font-size: 11px;text-align: center;'>Corriente</td>
                <td style='font-size: 11px;text-align: center;'>200-3001567347</td>
                <td style='font-size: 11px;text-align: center;width:180px;'>003-200-003001567347-35</td>
                <td style='font-size: 11px;text-align: center;width:150px;'>LIMAC DEL PERÚ E.I.R.L.</td>
            </tr>

            <tr style='background:#EEEEEE;font-size: 11px;text-align: center;'>
                <td><img src='https://www.limac.com.pe/assets/images/interbank.png' width='65'></td>
                <td style='font-size: 11px;text-align: center;'>Dólar Estadounidense (USD)</td>
                <td style='font-size: 11px;text-align: center;'>Corriente</td>
                <td style='font-size: 11px;text-align: center;'>200-3001567362</td>
                <td style='font-size: 11px;text-align: center;width:180px;'>003-200-003001567362-34</td>
                <td style='font-size: 11px;text-align: center;width:150px;'>LIMAC DEL PERÚ E.I.R.L.</td>
            </tr>
            </table>";

        }
        

        $html .= "<div style='width:800px;font-size:12px;'>".
        "<p>Cordialmente,<br>
		Departamento de Ventas.</p>";

		$html .= "<img src='https://www.limac.com.pe/assets/images/limac_gradient.jpg' width='120'><br>";

        $html.="</div></body></html>";



		$footer = "<div style='width:800px; font-size:9px; color:#aaa;'>".
        "IMPORTANTE/CONFIDENCIAL<br>
        Este documento contiene información personal, confidencial que van dirigidos única y exclusivamente a su destinatario y, de acuerdo a ley, no puede ser difundido. 
        Está completamente prohibido realizar copias, parciales o totales, así como propagar su contenido a otras personas que no sean el destinatario. 
        Si usted recibió este documento por error, sírvase informarlo al remitente y deshacerse del documento inmediatamente.</div>";

        $footer .= "<div style='width:800px; text-align:center;font-size:12px;'>";

        if($tipocot=='RYE'){
			$footer.="R&E TRADUCCIONES S.A.C.<br>";
		} else {
			$footer.="LIMAC DEL PERÚ E.I.R.L.<br>";
		}

        $footer.= $direccion;

        // if($tipocot=='RYE'){
		// 	$footer.="Schreiber 210";
		// } else {
		// 	$footer.="Schreiber 210";
		// }

        $footer.=", Lima.<br>
        Teléfono: ";

		
		$footer .= '999-999-999';
		$eemail = 'limac@limac.com';

        $footer.=" * Correo Electrónico: ".$eemail."<br>".
        "</div><br>";
        

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura</title>
</head>
<body>
	<?php
		echo $html;
	?>
</body>
</html>
