<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Estadisticas implements Crud{
    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ua.user_id,ua.nombre,ua.apellidop,ua.apellidom,ua.codigo_beca,ua.clave_socio,ig.fecha_hora
      FROM utilerias_administradores ua
      INNER JOIN impresion_gafete ig on(ua.user_id = ig.user_id)
      GROUP BY ua.user_id
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllConstancias(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ua.user_id,ua.nombre,ua.apellidop,ua.apellidom,ua.codigo_beca,ua.clave_socio,ig.fecha_descarga
      FROM utilerias_administradores ua
      INNER JOIN impresion_constancia ig on(ua.user_id = ig.user_id);
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllSocioActivos(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT COUNT(*) as c,pp.user_id,ua.nombre,ua.apellidop,ua.apellidom,ua.usuario,pp.status,ua.fecha
      FROM pendiente_pago pp
      INNER JOIN utilerias_administradores ua ON(pp.user_id = ua.user_id)
      WHERE pp.id_producto IN (2,3,4,5,6) and pp.status = 1 GROUP BY ua.user_id HAVING c > 4;
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getDataCaja(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ua.nombre,ua.apellidop,ua.apellidom,tc.productos,tc.total_pesos,tc.fecha_transaccion
      FROM utilerias_administradores ua
      INNER JOIN transaccion_compra tc ON (ua.user_id = tc.user_id);
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getDataCajaByFecha($date){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT tc.id_transaccion_compra,ua.nombre,ua.apellidop,ua.apellidom,tc.productos,tc.total_pesos,tc.fecha_transaccion
      FROM utilerias_administradores ua
      INNER JOIN transaccion_compra tc ON (ua.user_id = tc.user_id)
      WHERE fecha_transaccion LIKE '%$date%';
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