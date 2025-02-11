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
        echo json_encode("Insert correct");
    break;

    case "Update":
        $datos=$categoria->update_categoria($body["categoria_id"],$body["categoria_nombre"], $body["categoria_observacion"]);
        echo json_encode(" Update correct");
    break;
    case "DeleteEstado":  //eliminar cambiando el estado a 0 para tener un backup  - es más usado que eliminar permanentemente  - recordando que  solo mostrara la info con estado 1 
        $datos=$categoria->deleteEstado_categoria($body["categoria_id"]);
        echo json_encode("Delete 'Estado a 0' correct");
    break;



    case "Delete":  //eliminar permanetemente 
        $datos=$categoria->delete_categoria($body["categoria_id"]);
        echo json_encode("Delete correct");
    break;

}


?>