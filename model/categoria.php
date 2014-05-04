<?php
include_once("Main.php");
class categoria extends Main
{
	function save($P)
    {
		if($P['idcategoria']==null)
		{    
                    
			$sql =("insert into categoria values(".$this->max_id("categoria").",:p1,1)");
			$stmt =$this->db->prepare($sql);
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
              $stmt->bindValue(':p1',$P['descripcion'], PDO::PARAM_STR);
                $stmt->execute();
                $this->db->commit();
				$resp = array('rep'=>'1','str'=>'Ok');
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
			$sql =("update categoria set descripcion=:p1 where idcategoria=:p0");
			$stmt =$this->db->prepare($sql);
			try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
                               $stmt->bindValue(':p0',$P['idcategoria'], PDO::PARAM_INT);
				$stmt->bindValue(':p1',$P['descripcion'], PDO::PARAM_STR);
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
        $stmt = $this->db->prepare("SELECT * FROM categoria WHERE idcategoria = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
      

    function delete($id)
    {
	     $stmt = $this->db->prepare("update categoria set estado=0 where idcategoria=:id");
          $stmt->bindValue(':id', $id , PDO::PARAM_INT);
          $res=$stmt->execute();
        return $res;
    }
}
?>