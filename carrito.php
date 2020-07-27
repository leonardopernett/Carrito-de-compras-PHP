<?php
session_start();
include_once('global/config.php');
$mensaje="";


if(isset($_POST['btn'])){
    switch ($_POST['btn']) {
        case 'agregar':
           
            if(is_numeric(openssl_decrypt($_POST['id'], CODE, KEY))){
                $id = openssl_decrypt($_POST['id'], CODE, KEY);
               $mensaje = "ok.... ID" . $id;
            }else{
                $mensaje = "oppp.... ID incorrecto" . $id;
                break;
            }
       
            if(is_string(openssl_decrypt($_POST['name'], CODE, KEY))){
                $name = openssl_decrypt($_POST['name'], CODE, KEY);
                $mensaje = "ok.... name " . $name;
            }else{
                $mensaje = "oppp.... name incorrecto" . $name;
                 break;
            }
           
            if(is_numeric(openssl_decrypt($_POST['precio'], CODE, KEY))){
                $precio = openssl_decrypt($_POST['precio'], CODE, KEY);
                $mensaje = "ok.... precio " . $precio;
            }else{
                $mensaje = "oppp.... precio incorrecto" . $precio;
                break;
            }

            if(is_numeric(openssl_decrypt($_POST['cantidad'], CODE, KEY))){
                $cantidad = openssl_decrypt($_POST['cantidad'], CODE, KEY);
                $mensaje = "ok.... cantidad" . $cantidad;
            }else{
                $mensaje = "oppp.... cantidad incorrecto " . $cantidad;
                break;
            }

              if(!isset($_SESSION['carrito'])){
                  $productos = array(
                      'id'=>$id,
                      'name'=>$name,
                      'precio '=>$precio,
                      'cantidad'=>$cantidad
                  );
                  $_SESSION['carrito'][0]= $productos;

              }else {
                  $numeroProducto  =  count($_SESSION['carrito']);
                  $productos = array(
                    'id'=>$id,
                    'name'=>$name,
                    'precio '=>$precio,
                    'cantidad'=>$cantidad
                  );
                $_SESSION['carrito'][$numeroProducto]= $productos;
              }
              $mensaje= print_r($_SESSION, true);
        break;
    }
}

?>