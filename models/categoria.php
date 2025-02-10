
<?php
//crear clase para conectarnos a la tabla categoria de Mysql
class Categoria extends Conectar{
    // funcion que trae toda la info de la bd
    public function  get_categoria(){
    //Realizar la coneccion con el archivo conexion.php el cual se conecta a la base de datos
     $conectar= parent::Conexion(); // traer  la función conexion parent :: es una herencia trae informacion
     parent:: set_names(); //conecta con la funcion set_names del archivo conexion.php en la carpeta confi
     $sql="SELECT * FROM categoria WHERE estado = 1" ; // inicializa variable con la sentencia SQL - estado 1= los que estan activos para ver en la bd
     $sql=$conectar->prepare($sql);//se conecta la bd
     $sql->execute(); // se ejecuta la base de datos
     return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC); //muestra respuesta
     
    }

     // funcion para traer segun id  "categoria_id": 
    public function  get_categoria_id($categoria_id){
        $conectar= parent::Conexion(); 
         parent:: set_names(); 
         $sql="SELECT * FROM categoria WHERE estado = 1 and categoria_id = ?" ;
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $categoria_id);
         $sql->execute();         
         return $resultado =$sql->fetch(PDO::FETCH_ASSOC); //muestra respuesta
         
        }

         // funcion para insertar
    public function  insert_categoria($categoria_nombre, $categoria_observacion){
        $conectar= parent::Conexion(); 
         parent::set_names(); 
         $sql="INSERT INTO categoria (categoria_id, categoria_nombre, categoria_observacion, estado) VALUES (NULL,?,?,'1');" ;
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1,$categoria_nombre);  //indice 1 de los parametros de la función
         $sql->bindValue(2,$categoria_observacion); //indice 2 de los parametros de la función
         $sql->execute();         
         return $resultado =$sql->fetch(PDO::FETCH_ASSOC); //muestra respuesta
         
        }
}
?>