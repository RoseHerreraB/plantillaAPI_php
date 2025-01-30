<?php
//crear clase para conectarnos a la tabla categoria de Mysql
class Categoria extends Conectar{
    public function get_categoria(){
    //Realizar la coneccion con el archivo conexion.php el cual se conecta a la base de datos
     $conectar= parent::Conexion(); // conecta con la función conexion
     parent:: set_names(); //conecta con la funcion set_names del archivo conexion.php en la carpeta confi
     $sql="SELECT * FROM `categoria` WHERE estado = 1" ; // inicializa variable con la sentencia SQL - estado 1= los que estan activos para ver en la bd
     $sql=$conectar->prepare($sql);//se conecta la bd
     $sql->execute(); // se ejecuta la base de datos
     return $resultado =$sql->fetchAll(); //muestra respuesta
    }
}
?>