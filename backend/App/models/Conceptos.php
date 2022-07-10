<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Conceptos implements Crud{
    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM productos WHERE status = 1 ORDER BY id_producto ASC
sql;
      return $mysqli->queryAll($query);
        
    }
    public static function getById($id){
         
    }

    public static function deleteProducto($id){
      $mysqli = Database::getInstance(true);
      $query =<<<sql
      UPDATE productos SET status = 0 WHERE id_producto = $id
sql;

      return $mysqli->update($query);
    }

    
    public static function getProductos(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM productos
sql;
      return $mysqli->queryAll($query);
        
    }
    
    public static function insert($data){
        $mysqli = Database::getInstance(1);


        if($data->_tipo == "es_curso"){
          $tipo = 'es_curso';
        }else if($data->_tipo == "es_servicio"){
          $tipo = 'es_servicio';
        }
        $query=<<<sql
            INSERT INTO productos(clave, nombre, fecha_producto, descripcion, $tipo, precio_publico,tipo_moneda, max_compra, status)
            VALUES(:clave, :nombre, NOW(),:descripcion, 1, :precio_publico, 'MXN',1, 1);
sql;


            $parametros = array(
            
            ':clave'=>$data->_clave,
            ':nombre'=>$data->_nombre,
            ':descripcion'=>$data->_descripcion,
            ':precio_publico'=>$data->_precio           
            );
 
            $id = $mysqli->insert($query,$parametros);
            //UtileriasLog::addAccion($accion);
            return $id;
         
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }
    public static function getNumAsistencias(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT COUNT(*) AS total FROM asistencias
sql;
      return $mysqli->queryOne($query);
    }
} 