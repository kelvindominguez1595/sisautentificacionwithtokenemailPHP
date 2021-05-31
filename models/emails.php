<?php
    class Mails{
        public $emailDestino;
        public $asunto;
        public $nombreRemitente;
        public $emailRemitente;
        public $code;
        public $token;
        public $domains;
        
        public function ConfirmarEmail($data){
            $destinatario = $data->emailDestino; 
            $asunto =  $data->asunto; 
            $cuerpo = ' 
            <!DOCTYPE html>
            <html> 
            <head> 
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Prueba de correo</title> 
            </head> 
            <body> 
            <h1>Hola amigos!</h1> 
            <p> 
            <b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje.
            </p>       
            ';    

            $cuerpo .= '<h1>'.$data->code.'</h1>';
            $cuerpo .= '<a href="'.$data->domains.'?view=Autentificacion&action=Confirmarcuenta&token='.$data->token.'">IR A CONFIRMAR CUENTA</a>';
            $cuerpo .= '      </body> 
            </html> ';

            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            //dirección del remitente 
            $headers .= "From: ".$data->nombreRemitente." <".$data->emailRemitente.">\r\n"; 

            //ruta del mensaje desde origen a destino 
            $headers .= "Return-path: ".$data->emailRemitente."\r\n"; 
            mail($destinatario,$asunto,$cuerpo,$headers);
        } 
    }
?>