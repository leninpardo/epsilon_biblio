<?php
include_once("Main.php");
class editorial extends Main
{
	function save($P)
    {
		if($P['ideditorial']==null)
		{    
                    $id=$this->max_id("editorial");
			$sql =("insert into editorial values(".$id.",:p1,:p2,1)");
			$stmt =$this->db->prepare($sql);
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
              $stmt->bindValue(':p1',$P['nombre'], PDO::PARAM_STR);
              $stmt->bindValue(':p2',$P['nacionalidad'], PDO::PARAM_STR);
				//$stmt->bindValue(':p2',$P['idcomite'], PDO::PARAM_INT);
                //$stmt->bindValue(':p4',$P['distrito'], PDO::PARAM_STR);
                $stmt->execute();
                $this->db->commit();
				$resp = array('rep'=>'1','id'=>$id,'editorial'=>$P['nombre']);
				return $resp;
			}
			catch(PDOException $e) 
			{
				$this->db->rollBack();
				return array('res'=>"3",'msg'=>'no se pudo realizar la accion de insertar : '.$e->getMessage());
			}
		}
		else
		{  
			$sql =("update editorial set nombre=:p1,nacionalidad=:p2 where ideditorial=:p0");
			$stmt =$this->db->prepare($sql);
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
                               $stmt->bindValue(':p0',$P['ideditorial'], PDO::PARAM_INT);
				$stmt->bindValue(':p1',$P['nombre'], PDO::PARAM_STR);
				$stmt->bindValue(':p2',$P['nacionalidad'], PDO::PARAM_STR);
				$stmt->execute();
				$this->db->commit();
				$resp = array('rep'=>'2','str'=>'Ok');
				return $resp;
			}
			catch(PDOException $e) 
			{
				$this->db->rollBack();
				return array('res'=>"4",'msg'=>'no se pudo realizar la accion de actualizar : '.$e->getMessage());
			}
		}
	}

	function edit($id ) //Esta funcion es para actualizar en el formulario de la tabla seleccionada
	{
        $stmt = $this->db->prepare("SELECT * FROM editorial WHERE ideditorial = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
      

    function delete($id)
    {
	     $stmt = $this->db->prepare("update editorial set estado=0 where ideditorial=:id");
          $stmt->bindValue(':id', $id , PDO::PARAM_INT);
          $res=$stmt->execute();
        return $res;
    }
}
?>