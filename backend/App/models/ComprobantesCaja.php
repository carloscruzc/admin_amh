<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class ComprobantesCaja implements Crud{
    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT tc.*, CONCAT(ua.nombre," ", ua.apellidop," ", ua.apellidom) as nombre_user, uaa.nombre as nombre_caja
      FROM transaccion_compra tc
      INNER JOIN utilerias_administradores ua ON(tc.user_id = ua.user_id)
      INNER JOIN utilerias_administradores_admin uaa ON (tc.utilerias_administradores_id = uaa.utilerias_administradores_id);
sql;
      return $mysqli->queryAll($query);
        
    }
    public static function getById($id){
         
    }


    
    
    public static function insert($data){
               
         
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }
    public static function getNumAsistencias(){
      
    }
} 