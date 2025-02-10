<?php
header('content-Type: application/json');
//llamar los documentos que nesecito
require_once "../config/conexion.php";
require_once "../models/categoria.php";
$categoria = new Categoria();  //crear objeto
$body= json_decode(file_get_contents("php://input"), True);   //covertir a formato Json la informacion que se obtiene en el input

//crear servicio
switch ($_GET ["op"]){
    case "GetAll":
        $datos=$categoria->get_categoria();  //creamos variable datos, llamamos al objeto categoria y le agregamos la funcion get_categoria 
        echo json_encode($datos); // convertimos a un formato Json la info guardada en dato
    break;    
    case "GetId":
        $datos=$categoria->get_categoria_id($body["categoria_id"]);
        echo json_encode($datos);
    break;
    case "Insert":
        $datos=$categoria->insert_categoria($body["categoria_nombre"], $body["categoria_observacion"]);
        echo json_encode("correcto");
    break;
}


?>