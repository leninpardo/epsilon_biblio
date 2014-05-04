<?php
/**
 * Description of cargo_personal
 *
 * @author PEDRO ARMANDO
 */
require_once('Main.php');
class modulo extends Main {
    function Listmodulo()
    {
        $stmt = $this->db->prepare(" SELECT
		m.id_modulos as idmodulo,
                 mm.descripcion as padre,
                 m.descripcion as descripcion,
                 m.url,
				 m.orden,
        case m.estado when '1' then 'Activo' else 'Inactivo' end as estado
                       
                from modulos as m left outer join modulos as mm on mm.id_modulos=m.idpadre");
        $stmt->execute();
        $set = $stmt->fetchAll();
        return $set;
    }

      function newmodulo($P)
    {
        if($P['oper']==1)
	   {    if(isset($P['estado']) && $P['estado']== "on"){$estado="1";}else{$estado="0";}
	           $sql =$this->Query("seguridad.sp_modulos(1,0,:p2,:p3,:p4,:p5,:p6)");
               $stmt =$this->db->prepare($sql);
           try{
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $this->db->beginTransaction();
                 if($P['idpadre']==""){$P['idpadre']=null;}
                 $stmt->bindValue(':p2', $P['idpadre'] , PDO::PARAM_INT);
                 $stmt->bindValue(':p3',$P['descripcion'], PDO::PARAM_INT);
                 $stmt->bindValue(':p4',$P['url'], PDO::PARAM_STR);
                 $stmt->bindValue(':p5',$P['orden'], PDO::PARAM_INT);
                 $stmt->bindValue(':p6',$estado, PDO::PARAM_STR);
             
                $stmt->execute();

                $this->db->commit();
                  $resp = array('rep'=>'1','str'=>'Ok');
                  return $resp;
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"3",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
        }
		}else
		{  if(isset($P['estado']) && $P['estado']== "on"){$estado="1";}else{$estado="0";}
		    $sql =$this->Query("seguridad.sp_modulos(2,:id,:p2,:p3,:p4,:p5,:p6)");
               $stmt =$this->db->prepare($sql);
           try{
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $this->db->beginTransaction();
                 if($P['idpadre']==""){$P['idpadre']=null;}
                 $stmt->bindValue(':id',$P['id_modulos'], PDO::PARAM_INT);
                 $stmt->bindValue(':p2', $P['idpadre'] , PDO::PARAM_INT);
                 $stmt->bindValue(':p3',$P['descripcion'], PDO::PARAM_INT);
                 $stmt->bindValue(':p4',$P['url'], PDO::PARAM_STR);
                 $stmt->bindValue(':p5',$P['orden'], PDO::PARAM_INT);
                 $stmt->bindValue(':p6',$estado, PDO::PARAM_STR);
             
                $stmt->execute();

                $this->db->commit();
                  $resp = array('rep'=>'2','str'=>'Ok');
                  return $resp;
          }
          catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"4",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
          }
		
		}
     }


   function editmodulo($id ) {
        $stmt = $this->db->prepare("SELECT * FROM seguridad.modulos WHERE id_modulos = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
   

    function deleteModulo($id)
    {
		$stmt = $this->db->prepare("delete from seguridad.modulos WHERE id_modulos = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
         $res=$stmt->execute();
		 return $res;
    }
}
?>