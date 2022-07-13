<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Asistentes{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.nombre as nombre_usuario, ra.apellido_paterno, ra.apellido_materno, 
      ra.id_registro_acceso, ra.clave, ua.status as status_user, ra.email AS correo_electronico, 
      ch.nombre_categoria, uad.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN utilerias_asistentes ua ON (ra.id_registro_acceso = ua.id_registro_acceso) 
      INNER JOIN habitaciones_hotel hh ON (ra.id_habitacion = hh.id_habitacion) 
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = hh.id_categoria_habitacion)
      INNER JOIN utilerias_administradores uad ON (hh.utilerias_administradores_id = uad.utilerias_administradores_id)
      WHERE ra.id_registro_acceso = ua.id_registro_acceso
      and ra.politica = 1 and ua.status = 1 
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegister(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM registros_acceso WHERE politica = 1
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getDatauser($search){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT *
      FROM utilerias_administradores WHERE
      mostrar = 1 AND    
      CONCAT_WS(' ',usuario,nombre,apellidop,apellidom,user_id, clave,clave_socio) 
      LIKE '%$search%'
sql;
  
      return $mysqli->queryAll($query);
    }

    public static function getCostoCategoria($id_categoria){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT costo
      FROM categorias WHERE
      id_categoria = $id_categoria        
sql;
  
      return $mysqli->queryOne($query);
    }

    public static function getProductosById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM productos WHERE id_producto = $id
sql;
      return $mysqli->queryOne($query);
        
    }

    public static function getProgresosById($id,$clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM progresos_productocursos pr
      INNER JOIN utilerias_administradores ua ON pr.user_id = ua.user_id
      WHERE pr.id_producto = $id AND ua.clave = '$clave'
sql;
      return $mysqli->queryOne($query);
        
    }

    public static function getProgresosCongresoById($id,$clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT SUM(pr.segundos) as segundos FROM progresos_productocongreso pr
      INNER JOIN videos_congreso vc ON vc.id_video_congreso = pr.id_video_congreso
      INNER JOIN utilerias_administradores ua ON ua.user_id = pr.user_id
      WHERE ua.clave = '$clave' AND vc.id_producto = $id
sql;
      return $mysqli->queryOne($query);
        
    }

    public static function getAllRegisterSinHabitacion(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.apellido_paterno, ' ',ra.apellido_materno, ' - ',ra.email,'') as nombre
      FROM registros_acceso ra
      WHERE ra.id_registro_acceso NOT IN (SELECT id_registro_acceso FROM asigna_habitacion) and ra.politica = 1 ORDER BY nombre ASC
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegisterSinHabitacionSelect($id_user){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.apellido_paterno, ' ',ra.apellido_materno, ' - ',ra.email,'') as nombre
      FROM registros_acceso ra
      WHERE ra.id_registro_acceso NOT IN (SELECT id_registro_acceso FROM asigna_habitacion) and ra.politica = 1 and ra.id_registro_acceso != $id_user ORDER BY nombre ASC
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegisterConHabitacion(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.nombre, ra.apellido_paterno, ra.apellido_materno, ah.*, ch.nombre_categoria, ua.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN asigna_habitacion ah ON (ra.id_registro_acceso = ah.id_registro_acceso)
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = ah.id_categoria_habitacion)
      INNER JOIN utilerias_administradores ua ON(ua.utilerias_administradores_id = ah.utilerias_administradores_id)
      WHERE ra.politica = 1 
      GROUP BY ah.clave
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegisterConHabitacionByCategoria($id_habitacion){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.nombre,ah.id_asigna_habitacion, ch.id_categoria_habitacion, ua.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN asigna_habitacion ah ON (ra.id_registro_acceso = ah.id_registro_acceso)
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = ah.id_categoria_habitacion)
      INNER JOIN utilerias_administradores ua ON(ua.utilerias_administradores_id = ah.utilerias_administradores_id)
      WHERE ra.politica = 1 and ch.id_categoria_habitacion = $id_habitacion
      GROUP BY ah.clave
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getUsuariosByClaveHabitacion($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ah.id_registro_acceso, ah.clave, CONCAT(ra.nombre, ' ', ra.apellido_paterno, ' ',ra.apellido_materno) as nombre, ra.email, ra.telefono, ra.img,ah.id_asigna_habitacion
      FROM asigna_habitacion ah
      INNER JOIN registros_acceso ra ON (ah.id_registro_acceso = ra.id_registro_acceso)
      WHERE ah.clave = '$clave'
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getCountAsistentesByClave($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT count(*) as total_asignados
      FROM asigna_habitacion ah
      INNER JOIN registros_acceso ra ON (ah.id_registro_acceso = ra.id_registro_acceso)
      WHERE ah.clave = '$clave'
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getUsuarioByName($nombre){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT CONCAT (nombre, ' ',apellidop, ' ',apellidom) AS nombre FROM `utilerias_administradores` 
      WHERE nombre LIKE '%$nombre%'
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegistrosAcceso(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM utilerias_administradores
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getUserById(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM utilerias_administradores
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getUserReferenceNull(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM utilerias_administradores WHERE reference is null
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getUserByClaveCompra($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ua.user_id,ua.nombre, ua.apellidop, ua.apellidom,ua.usuario, ua.telefono, ua.clave as clave_user,pp.clave
      FROM utilerias_administradores ua
      INNER JOIN pendiente_pago pp ON(ua.user_id = pp.user_id)
      WHERE pp.clave = '$clave' GROUP BY pp.user_id
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT utilerias_asistentes_id, id_registro_acceso, usuario, contrasena, politica, status FROM utilerias_asistentes WHERE utilerias_asistentes_id = $id;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getByClaveRA($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.*, ra.apellidop as apellido_paterno, ra.apellidom as apellido_materno, ra.user_id AS clave_ticket, pa.pais, es.estado, CONCAT(ra.user_id,'.png') AS qr  
      FROM utilerias_administradores ra
      INNER JOIN paises pa ON (ra.id_pais = pa.id_pais)
      INNER JOIN estados es ON (ra.id_estado = es.id_estado)
      WHERE ra.user_id = '$clave';
sql;
      return $mysqli->queryAll($query);
  }

    public static function getRegistroAccesoById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.*, ra.user_id AS clave_ticket, CONCAT(ra.user_id,'.png') AS qr  FROM utilerias_administradores ra
      WHERE ra.user_id = $id
sql;
      return $mysqli->queryAll($query);
  }

  public static function getRegistroAccesoByClaveRA($clave){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT ra.*, ra.apellidop as apellido_paterno, ra.apellidom as apellido_materno, ra.clave AS clave_ticket, CONCAT(ra.clave,'.png') AS qr, ra.clave  
    FROM utilerias_administradores ra
    WHERE ra.clave = '$clave'
sql;
    return $mysqli->queryAll($query);
}

  public static function getRegistroAccesoHabitacionByClaveRA($clave){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT ra.*, ah.id_habitacion as numero_habitacion
    FROM registros_acceso ra
    INNER JOIN asigna_habitacion ah
    ON ra.id_registro_acceso = ah.id_registro_acceso
    WHERE ra.clave = '$clave'
sql;
  return $mysqli->queryAll($query);
}

    public static function getHabitacionByNumber($numero_habitacion){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT DISTINCT ra.nombre as nombre_usuario, ra.apellido_paterno, ra.apellido_materno, ua.status as status_user, hh.numero_habitacion, ch.nombre_categoria, uad.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN utilerias_asistentes ua ON (ra.id_registro_acceso = ua.id_registro_acceso) 
      INNER JOIN habitaciones_hotel hh ON (ra.id_habitacion = hh.id_habitacion) 
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = hh.id_categoria_habitacion)
      INNER JOIN utilerias_administradores uad ON (hh.utilerias_administradores_id = uad.utilerias_administradores_id)
      WHERE ra.id_registro_acceso = ua.id_registro_acceso
      and ra.politica = 1 and ua.status = 1 and hh.numero_habitacion = $numero_habitacion
sql;
      return $mysqli->queryAll($query);
  }

    public static function getTotalById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM utilerias_asistentes ua INNER JOIN registros_acceso ra ON ua.id_registro_acceso = ra.id_registro_acceso WHERE ua.utilerias_asistentes_id = $id;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getTotalByClaveRA($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.*, ra.apellidop as apellido_paterno, ra.apellidom as apellido_materno, ra.user_id AS clave_ticket, pa.pais, es.estado, CONCAT(ra.user_id,'.png') AS qr  
      FROM utilerias_administradores ra
      INNER JOIN paises pa ON (ra.id_pais = pa.id_pais)
      INNER JOIN estados es ON (ra.id_estado = es.id_estado)
      WHERE ra.user_id = '$clave';
sql;
      return $mysqli->queryAll($query);
  }

  public static function getPais(){       
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT * FROM paises
sql;
    return $mysqli->queryAll($query);
  }

  public static function getStateByCountry($id_pais){
    $mysqli = Database::getInstance(true);
    $query =<<<sql
    SELECT * FROM estados where id_pais = '$id_pais'
sql;
  
    return $mysqli->queryAll($query);
  }

    public static function getIdRegistroAcceso($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM utilerias_asistentes WHERE id_registro_acceso = $id;
sql;
      return $mysqli->queryAll($query);
  }
    
  public static function insert($data){
    $mysqli = Database::getInstance(1);
    $query=<<<sql
    INSERT INTO utilerias_administradores(codigo_beca,nombre, apellidop, apellidom, usuario, title, telefono, id_pais, id_estado, referencia, monto_congreso, socio,clave,id_categoria,motivo)
    VALUES('',:nombre, :apellidop,:apellidom, :usuario, :title, :telefono, :pais, :estado, :referencia, :monto_congreso, 4,:clave,:categoria,:motivo);
sql;

        $parametros = array(

        ':nombre'=>$data->_nombre,
        ':apellidop'=>$data->_apellidop,
        ':apellidom'=>$data->_apellidom,
        ':usuario'=>$data->_usuario,
        ':title'=>$data->_title,
        ':telefono'=>$data->_telefono,
        ':pais'=>$data->_pais,
        ':estado'=>$data->_estado,
        ':categoria'=>$data->_categoria,
        ':referencia'=>$data->_referencia,
        ':monto_congreso' => $data->_monto_congreso,
        ':motivo' => $data->_motivo,
        ':clave'=>$data->_clave

        );
        $id = $mysqli->insert($query,$parametros);
        return $id;
      
  }

  public static function getUserRegister($email){
    $mysqli = Database::getInstance(true);
    $query =<<<sql
    SELECT * FROM utilerias_administradores WHERE usuario = '$email'
sql;

    return $mysqli->queryAll($query);
}

    public static function insertTicket($clave){
      $mysqli = Database::getInstance(true);
      $qr_code = $clave.'.png';
      $query=<<<sql
      INSERT INTO ticket_virtual (`clave`, `qr`) VALUES('$clave', '$qr_code')
sql;

      return $mysqli->insert($query);
    }

    public static function insertImpresionConstancia($user_id,$tipo_constancia,$id_producto){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      INSERT INTO  impresion_constancia (user_id, tipo_constancia, id_producto,fecha_descarga) VALUES('$user_id', '$tipo_constancia','$id_producto',NOW())
sql;

      return $mysqli->insert($query);
    }

    public static function update($data){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
          UPDATE utilerias_administradores 
          SET nombre = '$data->_nombre', apellidop = '$data->_apellido_paterno', apellidom = '$data->_apellido_materno', clave_socio = '$data->_clave_socio', id_categoria = '$data->_id_categoria', monto_congreso = '$data->_monto_congreso', usuario = '$data->_email'
          WHERE user_id = '$data->_id';
sql;

        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_id = $data->_administrador_id;
        return $mysqli->update($query);
    }

    public static function generateCodeOnTable($email,$id_tv){
      $mysqli = Database::getInstance(true);
      // UPDATE registros_acceso SET clave = '$code', id_ticket_virtual = $id_tv WHERE email = '$email'
      $query=<<<sql
      UPDATE registros_acceso SET id_ticket_virtual = $id_tv WHERE email = '$email'
sql;

      return $mysqli->update($query);
    }

    public static function updateClaveRA($id,$clave){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE utilerias_administradores SET clave = '$clave' WHERE user_id = '$id'
sql;

      return $mysqli->update($query);
    }

    public static function updateTicketVirtualRA($id,$clave){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE registros_acceso SET ticket_virtual = '$clave' WHERE id_registro_acceso = '$id'
sql;

      return $mysqli->update($query);
    }

    public static function getIdTicket($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM ticket_virtual WHERE clave = '$clave'
sql;
      return $mysqli->queryAll($query);
    }

    public static function getRegistroByEmail($email){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM registros_acceso WHERE email = '$email'
sql;
      return $mysqli->queryAll($query);
    }

    public static function getClaveByEmail($email){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.*, ra.ticket_virtual AS clave_ticket, CONCAT(ra.ticket_virtual,'.png') AS qr FROM registros_acceso ra
      WHERE email = '$email';
sql;
      return $mysqli->queryAll($query);
  }

    public static function delete($id){
        
    }

    public static function getPendienesPagoUser($user_id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT pp.id_pendiente_pago,p.id_producto,p.nombre as nombre_producto,ua.nombre as nombre_user,ua.clave_socio
      FROM pendiente_pago pp
      INNER JOIN productos p ON (p.id_producto = pp.id_producto)
      INNER JOIN utilerias_administradores ua ON(pp.user_id = ua.user_id)
      WHERE  ua.user_id = $user_id and pp.STATUS = 0
sql;
      return $mysqli->queryAll($query);
  } 

  public static function getProductosNotInPendientesPagoAsignaProducto($user_id){
    $mysqli = Database::getInstance();
    $query=<<<sql
    SELECT p.id_producto, p.nombre as nombre_producto, ua.clave_socio, ua.monto_congreso
    FROM productos p
    INNER JOIN utilerias_administradores ua
    WHERE id_producto NOT IN (SELECT id_producto FROM pendiente_pago WHERE user_id = $user_id) AND ua.user_id = $user_id and p.es_curso = 1
sql;
    return $mysqli->queryAll($query);
}


// public static function getCategoria($id)
//     {
//         $mysqli = Database::getInstance();
//         $query = <<<sql
//       SELECT ua.*, cate.*, cate.id_categoria as idcate, cate.categoria catecate FROM categorias cate
//       INNER JOIN utilerias_administradores ua ON ua.id_categoria = cate.id_categoria
//       WHERE ua.user_id = '$id'
//       ORDER BY cate.id_categoria ASC
// sql;

//         return $mysqli->queryAll($query);
//         //$mysqli -> set_charset("utf8");
//     }

    public static function getCategoria()
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
      SELECT * FROM categorias WHERE id_categoria;
sql;

        return $mysqli->queryAll($query);
        //$mysqli -> set_charset("utf8");
    }

    public static function getCategoriaMas()
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
      SELECT * FROM categorias WHERE id_categoria != 1;
sql;

        return $mysqli->queryAll($query);
        //$mysqli -> set_charset("utf8");
    }

    public static function getIdUsuarios($id)
    {
        $mysqli = Database::getInstance();
        $query = <<<sql
      SELECT * FROM utilerias_administradores
      WHERE user_id = '$id'
sql;

        return $mysqli->queryOne($query);
        //$mysqli -> set_charset("utf8");
    }


}